<?php
  
namespace App\Http\Controllers;

use App\Models\AccountSetting;
use App\Models\MemberSetting;
use App\Models\PayPlanLeader;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserMembership;
use App\Models\UserPayment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
  
class MemberController extends Controller
{
    protected $user;
    protected $userMembership;

    public function __construct(User $user, UserMembership $userMembership)
    {
        $this->user = $user;
        $this->userMembership = $userMembership;
    }

    public function index(Request $request)
    {
        $memberSetting = MemberSetting::first();
        $prefix = $request->route()->getPrefix();
        if (Auth::user()->type == 2) { // Member
            return view('member.dashboard',[
                'prefix' => str_replace('/','',$prefix)
            ]);
        } else {
            if ($request->submit == 'search') {
                $list = User::with(['userDetail','plans.leader'])->where('type', 2);

                if ($request->filled('firstname')) {
                    $list->where('firstname', 'like', '%' . $request->firstname . '%');
                }

                if ($request->filled('email')) {
                    $list->where('email', 'like', '%' . $request->email . '%');
                }

                if ($request->filled('username')) {
                    $list->where('username', 'like', '%' . $request->username . '%');
                }

                $list = $list->latest()->simplePaginate(5);
            } else {
                $list = User::with(['userDetail'])->where('type',2)->latest()
                ->simplePaginate(5);
            }
            foreach ($list as $key => $val) {
                $memberPlan = UserMembership::with(['leader'])->where('user_id',$val->id)->where('is_current_plan',1)->first();
                if ($memberPlan) {
                    $color = match($memberPlan->leader->id) {
                        1 => '#CD7F32',
                        2 => '#C0C0C0',
                        3 => '#FFD700',
                        4 => '#E5E4E2',
                        5 => '#b9f2ff',
                    };
                    $name = '<span style="color: '.$color.' !important">'.$memberPlan->leader->name.'</span>';
                    $list[$key]['level'] = $name;
                } else {
                    $list[$key]['level'] = '-';
                }
            }

            return view('admin.members.browse',[
                'prefix' => str_replace('/','',$prefix),
                'list' => $list,
                'firstname' => @$request->firstname && @$request->submit == 'search' ? @$request->firstname : '',
                'email' => @$request->email && @$request->submit == 'search' ? @$request->email : '',
                'username' => @$request->username && @$request->submit == 'search' ? @$request->username : '',
                'memberSetting' => $memberSetting,
            ]);
        }
    }

    public function create()
    {
        $referrers = User::where('status',1)->get();
        $membershipPlans = PayPlanLeader::select(['id','name','type','reg_fee'])->get();
        return view('admin.members.create',[
            'membershipPlans' => $membershipPlans,
            'referrers' => $referrers
        ]);
    }

    public function memberGenealogy(Request $request)
    {
        $users = [];
        $isSearched = false;
        if ($request->search && !empty($request->search)) {
            $member = User::where('username','like', '%' . $request->search . '%')->first();
            if ($member) {
                $users = User::with(['userDetail'])->where('id',@$member->id)->with('descendants')->get();
                $isSearched = true;
            }
        } else {
            $users = User::with(['userDetail'])->whereNull('parent_id')->with('descendants')->get();
        }
        $memberSetting = MemberSetting::first();
        $accountSetting = AccountSetting::first();
        return view('admin.members.genealogy',[
            'users' => $users,
            'accountSetting' => $accountSetting,
            'memberSetting' => $memberSetting,
            'isSearched' => $isSearched
        ]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'username' => ['required','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'type' => 2, // Member
                'parent_id' => $request->ref_username,
                'status' => 1,
                'ip_address' => $request->ip()
            ]);

            DB::commit();
            return redirect()->route('admin.member.list')->withSuccess('Member created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        $user = $this->user->findById($id);
        $membershipPlans = $this->userMembership->findByUserId($id);
        if ($membershipPlans) {
            $membershipPlans->delete();
        }
        $userDetails = UserDetail::where('user_id',$user->id)->first();
        if ($userDetails) {
            $this->commonDelete($userDetails->avatar);
            $userDetails->delete();
        }
        if ($user) {
            $user->delete();
        }
        return redirect()->route('admin.member.list')->withSuccess('Member deleted successfully!');
    }

    public function view($id)
    {
        $user = $this->user->findById($id);
        $memberSetting = MemberSetting::first();
        $membershipPlan = $this->userMembership->findByUserId($id);
        $userPayments = UserPayment::with('leader')->where('user_id',$id)->where('type',1)->get();
        return view('admin.members.view',[
            'user' => $user,
            'membershipPlan' => $membershipPlan,
            'memberSetting' => $memberSetting,
            'userPayments' => $userPayments,
        ]);
    }

    public function edit($id)
    {
        $user = $this->user->findById($id);
        $membershipPlan = $this->userMembership->findByUserId($id);
        return view('admin.members.edit',[
            'user' => $user,
            'membershipPlan' => $membershipPlan
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::find($request->id);
            DB::beginTransaction();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->username = $request->username;
            $user->email = $request->email;
            if (isset($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            DB::commit();
            return redirect()->route('admin.member.list')->withSuccess('Member updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function loginAsMember($id)
    {
        return redirect()->route('member.dashboard',['id' => $id]);
    }

    public function approvePayment(Request $request)
    {
        $userPayement = UserPayment::find($request->id);
        $userPayement->is_confirm = 1;
        $userPayement->is_unapproved = 0;
        $userPayement->save();
        $allPayments = UserPayment::where('user_id',$userPayement->user_id)->where('leader_id',@$request->leader_id)->count();
        if ($allPayments == 3) {
            UserMembership::where('user_id',$userPayement->user_id)->update([
                'is_current_plan' => 0
            ]);
            UserMembership::create([
                'user_id' => $userPayement->user_id,
                'leader_id' => $request->leader_id,
                'is_current_plan' => 1
            ]);
        }
        return redirect()->back()->withSuccess('Payment approved successfully!');
    }

    public function declinePayment(Request $request)
    {
        $userPayement = UserPayment::find($request->id);
        $userPayement->is_declined = 1;
        $userPayement->save();
        return redirect()->back()->withSuccess('Payment declined successfully!');
    }

    public function waitingPayments()
    {
        $memberSetting = MemberSetting::first();
        $list = UserPayment::with(['user','leader'])->where('type',1)->orderBy('is_confirm','ASC')->simplePaginate(10);
        return view('admin.waiting_payments',[
            'list' => $list,
            'memberSetting' => $memberSetting
        ]);
    }

    public function unapprovePayment(Request $request)
    {
        $userPayement = UserPayment::find($request->id);
        $userPayement->is_unapproved = 1;
        $userPayement->is_confirm = 0;
        $userPayement->save();
        
        return redirect()->back()->withSuccess('Payment unapproved successfully!');
    }
}