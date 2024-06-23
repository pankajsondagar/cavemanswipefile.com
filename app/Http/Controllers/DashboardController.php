<?php
  
namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\Feedback;
use App\Models\MemberSetting;
use App\Models\Notification;
use App\Models\PayPlanLeader;
use App\Models\User;
use App\Models\UserMembership;
use App\Models\UserPayment;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
  
class DashboardController extends Controller
{
    protected $plans;
    protected $notification;

    public function __construct(PayPlanLeader $plans,Notification $notification)
    {
        $this->plans = $plans;
        $this->notification = $notification;
    }

    /**
     * Dashboard
     * 
     * @param Request $request
     * @return View
     */
    public function dashboard(Request $request, $id = null): View
    {
        $prefix = $request->route()->getPrefix();
        if (Auth::user()->type == 2 || $id != null) { // Member
            $plans = $this->plans->getAllPlans();
            $userId = $id ?? Auth::user()->id;
            $authMember = User::find($userId);
            $userPayments = UserPayment::with('leader')
                ->where('sponser_id',$userId)
                ->get();
            foreach ($userPayments as $key => $val) {
                $status = $this->getMemberPaymentStatus($userId,$val->leader_id);
                $val['allow_actions'] = $status;
            }
            $mySponser = User::find($authMember->parent_id);
            $sponserOfSponser = User::find(@$mySponser->parent_id);
            $refferals = User::where('parent_id',$userId)->count();
            return view('member.dashboard',[
                'prefix' => str_replace('/','',$prefix),
                'plans' => $plans,
                'authMember' => $authMember,
                'isNormal' => $id ? false : true,
                'userPayments' => $userPayments,
                'mySponser' => $mySponser,
                'sponserOfSponser' => $sponserOfSponser,
                'refferals' => $refferals
            ]);
        } else {
            // Delete users which are created 24 hours before
            $users = User::where('type',2)->where('status',0)->get();
            foreach ($users as $user) {
                $createdAt = Carbon::parse($user->created_at);
                $twentyFourHoursAgo = Carbon::now()->subHours(24);

                if ($createdAt->lt($twentyFourHoursAgo)) {
                    $user = User::find($user->id);
                    $user->delete();
                }
            }            

            $memberSetting = MemberSetting::first();
            $query = User::where('type',2);
            $recentMembers = $query->latest()->simplePaginate(5);
            foreach ($recentMembers as $key => $val) {
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
                    $recentMembers[$key]['level'] = $name;
                } else {
                    $recentMembers[$key]['level'] = '-';
                }
            }
            $totalMembers = $query->count();
            $totalRegistered = $query->where('status',1)->count();
            return view('admin.dashboard',[
                'prefix' => str_replace('/','',$prefix),
                'recentMembers' => $recentMembers,
                'memberSetting' => $memberSetting,
                'totalMembers' => $totalMembers,
                'totalRegistered' => $totalRegistered
            ]);
        }
    }

    public function genealogy(Request $request,$id = null)
    {
        $authMember = User::find($id);
        $memberSetting = MemberSetting::first();
        $users = [];
        if ($request->search && !empty($request->search)) {
            $member = User::where('username','like', '%' . $request->search . '%')->first();
            if ($member) {
                $users = User::with(['userDetail'])->where('id',@$member->id ?? Auth::user()->id)
                ->where('type',2)->with('descendants')->get();
            } 
        } else {
            $users = User::with(['userDetail'])
            ->where('id',@$authMember->id ?? Auth::user()->id)
            ->where('type',2)
            ->with('descendants')
            ->get();
        }
        return view('member.genealogy',[
            'users' => $users,
            'memberSetting' => $memberSetting,
            'authMember' => $authMember
        ]);
    }

    public function feedback($id = null)
    {
        $authMember = User::find($id);
        return view('member.feedback',[
            'authMember' => $authMember
        ]);
    }

    public function saveFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => ['required'],
            'message' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Feedback::create([
            'subject' => $request->subject,
            'message' => $request->message,
            'ip_address' => $request->ip(),
            'user_id' => $request->id ?? Auth::user()->id,
        ]);

        $emailTemplate = $this->notification->getBySlug('contact_us');
        $content = $emailTemplate->description;
        $user = User::find($request->id ?? Auth::user()->id);
        $content = str_replace("[[firstname]]",$user->firstname,$content);
        $content = str_replace("[[message]]",$request->message,$content);
        $subject = $request->subject;
        $body = [
            'content' => $content,
            'subjectContent' => $subject
        ];

        try {
            $admin = User::where('type',1)->first();
            Mail::to($admin->email)->send(new ContactUs($body));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

        return back()->with('success','Your feedback has been successfully submitted! you will get notified once admin replies back!');
    }
}