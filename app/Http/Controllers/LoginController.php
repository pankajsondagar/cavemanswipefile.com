<?php
  
namespace App\Http\Controllers;

use App\Mail\AccountConfirmation;
use App\Mail\ForgetPasswordLink;
use App\Mail\WelcomeEmail;
use App\Models\Content;
use App\Models\Notification;
use App\Models\ResetPasswordToken;
use App\Models\User;
use App\Models\UserConfirmation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
  
class LoginController extends Controller
{
    protected $notification;
    protected $resetPasswordToken;
    protected $user;
    protected $userConfirmation;

    public function __construct(Notification $notification, ResetPasswordToken $resetPasswordToken, User $user, UserConfirmation $userConfirmation)
    {
        $this->notification = $notification;
        $this->resetPasswordToken = $resetPasswordToken;
        $this->user = $user;
        $this->userConfirmation = $userConfirmation;
    }

    /**
     * Login Form
     */
    public function viewLogin(Request $request): View
    {
        $prefix = $request->route()->getPrefix();
        return view('login',[
            'prefix' => str_replace('/','',$prefix)
        ]);
    }

    /**
     * Login
     * 
     * @param Request $request
     * @return View
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                return redirect()->back()->withError('Your account is not confirmed yet!');
            }
            if (Auth::user()->type == 2) {
                $user = User::find(Auth::user()->id);
                $user->is_online = 1;
                $user->save();
                return redirect()->route('member.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return redirect()->back()->withError('Invalid login credentials!');
        }
    }

    /**
     * Logout
     */
    public function logout()
    {
        $user = User::find(Auth::user()->id);
        $user->is_online = 0;
        $user->save();
        Auth::logout();
        if ($user->type == 1) {
            $content = Content::where('slug','admin-url')->first();
            return redirect($content->content)->withSuccess('Bye '.$user->username.', You have been successfully logged out.');
        } else {
            return redirect('member/login')->withSuccess('Bye '.$user->username.', You have been successfully logged out.');
        }
    }

    /**
     * Register Form
     */
    public function viewRegister($hashedUsername = null): View
    {
        if ($hashedUsername) {
            $latestActiveUser = User::where('hashed_username',$hashedUsername)->firstOrFail();
        } else {
            $latestActiveUser = User::select(['id','username'])->where('type',2)->where('has_plan',1)->latest()->first();
            if (!$latestActiveUser) {
                $latestActiveUser = User::select(['id','username'])->where('type',1)->first();
            }
        }
        return view('register',[
            'latestActiveUser' => $latestActiveUser
        ]);
    }

    /**
     * Forgot Password Form
     */
    public function forgetPassword(Request $request): View
    {
        $prefix = $request->route()->getPrefix();
        return view('forget_password',[
            'prefix' => str_replace('/','',$prefix)
        ]);
    }

    /**
     * Register
     */
    public function register(Request $request)
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

        $ip = $request->ip();
        $userWithSameIp = User::where('ip_address',$ip)->where('type',2)->first();
        if ($userWithSameIp) {
            return redirect()->back()->withError('Your account has been already registered!');   
        }

        try {
            DB::beginTransaction();
            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'type' => 2, // Member
                'parent_id' => $request->parent_id,
                'ip_address' => $ip,
            ]);

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 50; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            $token = $randomString;

            $url = url('confirm-account/'.$token);
            // Email Template
            $emailTemplate = $this->notification->getBySlug('email_confirmation');
            $content = $emailTemplate->description;
            $subject = $emailTemplate->subject;
            $content = str_replace("[[firstname]]",$user->firstname,$content);
            $content = str_replace("[[emailconfirmlink]]",'<a href="'.$url.'">'.$url.'</a>',$content);
            $subjectContent = str_replace("[[firstname]]",$user->firstname,$subject);
            $body = [
                'content' => $content,
                'subjectContent' => $subjectContent
            ];
     
            try {
                Mail::to($request->email)->send(new AccountConfirmation($body));
            } catch (Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }

            UserConfirmation::create([
                'email' => $user->email,
                'token' => $token,
                'plain_password' => $request->password,
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }

        $registerMsg = Content::where('slug','register-msg')->first();

        return redirect('member/login')->withSuccess(@$registerMsg->content);
    }

    /**
     * Forget Password Link
     */
    public function forgetPasswordLink(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if ($user) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 50; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            $token = $randomString;
            $url = url('reset-password/'.$token);
            // Email Template
            $emailTemplate = $this->notification->getBySlug('reset_password_request');
            $content = $emailTemplate->description;
            $content = str_replace("[[firstname]]",$user->firstname,$content);
            $content = str_replace("[[passwordreset_url]]",'<a href="'.$url.'">'.$url.'</a>',$content);
            $body = [
                'content' => $content
            ];
     
            try {
                Mail::to($request->email)->send(new ForgetPasswordLink($body));
            } catch (Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }

            ResetPasswordToken::create([
                'email' => $user->email,
                'token' => $token
            ]);
            return redirect()->back()->withSuccess('A reset link has been sent to your email address. Please check it.');
        } else {
            return redirect()->back()->withError('Email address is not recognized!.Please try it again.');
        }
    }

    /**
     * Reset Password
     * 
     * @param $token
     */
    public function resetPassword($token)
    {
        $data = $this->resetPasswordToken->getRecord($token);
        if ($data) {
            return view('reset_password',['token' => $data->token]);
        } else {
            return redirect()->route('member.login')->withError('Reset password link has been expired!');
        }
    }

    /**
     * Reset Password Update
     * 
     * @param Request $request
     */
    public function resetPasswordUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password|min:6'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $this->resetPasswordToken->getRecord($request->token);

        if ($data) {
            $user = $this->user->findByEmail($data->email);
            if ($user) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                // Delete token
                $data->delete();
                return redirect()->route('member.login')->withSuccess('Congratulation!
                New password have been applied. You can log in to your back office using your new password.');
            } else {
                return redirect()->route('member.login')->withError('Reset password link has been expired!');
            }
        } else {
            return redirect()->route('member.login')->withError('Reset password link has been expired!');
        }
    }

    /**
     * Confirm Account
     */
    public function confirmAccount($token)
    {
        $data = $this->userConfirmation->getRecord($token);
        if ($data) {    
            $user = $this->user->findByEmail($data->email);
            if ($user) {
                $user->status = 1;
                $user->save();
                // Delete token
                // Email Template
                $emailTemplate = $this->notification->getBySlug('welcome_to_caveman_leads');
                $content = $emailTemplate->description;
                $content = str_replace("[[firstname]]",$user->firstname,$content);
                $fullName = $user->firstname . ' ' . $user->lastname;
                $content = str_replace("[[fullname]]",$fullName,$content);
                $content = str_replace("[[email]]",$user->email,$content);
                $content = str_replace("[[username]]",$user->username,$content);
                $content = str_replace("[[rawpassword]]",$data->plain_password,$content);
                $content = str_replace("[[login_url]]",'<a href="'.route('member.login').'">'.route('member.login').'</a>',$content);
                $subject = $emailTemplate->subject;
                $subjectContent = str_replace("[[firstname]]",$user->firstname,$subject);
                $body = [
                    'content' => $content,
                    'subjectContent' => $subjectContent
                ];
                
                try {
                    Mail::to($user->email)->send(new WelcomeEmail($body));
                } catch (Exception $e) {
                    return redirect()->back()->withError($e->getMessage());
                }
                $data->delete();
                return redirect()->route('member.login')->withSuccess('Your account has been verified now. Please login to continue!');
            } else {
                return redirect()->route('member.login')->withError('Reset password link has been expired!');
            }
        } else {
            return redirect()->route('member.login')->withError('Email confirmation link has been expired!');
        }
    }
}