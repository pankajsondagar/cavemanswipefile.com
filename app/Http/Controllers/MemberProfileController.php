<?php
  
namespace App\Http\Controllers;

use App\Models\PaymentOption;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MemberProfileController extends Controller
{
    protected $user;
    protected $userDetail;

    public function __construct(User $user, UserDetail $userDetail)
    {
        $this->user = $user;
        $this->userDetail = $userDetail;
    }

    /**
     * Profile
     * 
     * @param Request $request
     * @return View
     */
    public function profile($id = null): View
    {
        $user = $this->user->findById($id ?? Auth::user()->id);
        $profile = $this->userDetail->findByUserId($user->id);
        if (!$profile) {
            $profile = UserDetail::create([
                'user_id' => $user->id,
            ]);
        }
        return view('member.profile',[
            'profile' => $profile,
            'user'    => $user,
            'authMember' => $user,
            'isNormal' => $id ? false : true,
        ]);
    }

    /**
     * Update Profile
     */
    public function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = $this->user->findById($request->id ?? Auth::user()->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();

        $avatar = null;
        if ($request->file('avatar')) {
            $imgIcon = $request->file('avatar');
            $filename = Carbon::now()->timestamp . '_' . $imgIcon->getClientOriginalName();
            $imgIcon->storeAs('public/uploads', $filename);
            $avatar = $filename;
        }

        $profile = $this->userDetail->findByUserId($user->id);
        $profile->is_notify = $request->is_notify;
        $profile->about_me = $request->about_me;
        $profile->state = $request->state;
        $profile->country = $request->country;
        $profile->address = $request->address;
        $profile->phone = $request->phone;
        $profile->twitter_url = $request->twitter_url;
        $profile->fb_url = $request->fb_url;
        if ($avatar != null) {
            $profile->avatar = $avatar;
        }
        $profile->save();

        return redirect()->back()->withSuccess('Record updated succesfully!');
    }

    /**
     * Account
     * 
     * @param Request $request
     * @return View
     */
    public function account($id = null): View
    {
        $user = $this->user->findById($id ?? Auth::user()->id);
        $profile = $this->userDetail->findByUserId($user->id);
        if (!$profile) {
            $profile = UserDetail::create([
                'user_id' => $user->id,
            ]);
        }
        $paymentOption = PaymentOption::where('user_id',$user->id)->first();
        if (!$paymentOption) {
            $paymentOption = PaymentOption::create([
                'title' => 'Manual Payment',
                'user_id' => $user->id,
                'content' => null
            ]);
        }
        return view('member.account',[
            'profile' => $profile,
            'user'    => $user,
            'authMember' => $user,
            'data' => $paymentOption,
            'isNormal' => $id ? false : true,
        ]);
    }

    /**
     * Update Account
     */
    public function accountUpdate(Request $request)
    {
        $data = PaymentOption::find($request->id);
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();

        return redirect()->back()->withSuccess('Record updated succesfully!');
    }

    /**
     * Website
     * 
     * @param Request $request
     * @return View
     */
    public function website(): View
    {
        return view('member.website',[
            
        ]);
    }

    /**
     * Update Website
     */
    public function websiteUpdate(Request $request)
    {

    }

    /**
     * Password
     * 
     * @param Request $request
     * @return View
     */
    public function password($id = null): View
    {
        $user = User::find($id ?? Auth::user()->id);
        return view('member.password',[
            'authMember' => $user,
            'isNormal' => $id ? false : true,
        ]);
    }

    /**
     * Update Password
     */
    public function passwordUpdate(Request $request)
    {
        if (!empty($request->password)) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password|min:6'
            ]);
    
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = User::find($request->id ?? Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->withSuccess('Password updated successfully!');
        } else {
            return redirect()->back();
        }
    }
}