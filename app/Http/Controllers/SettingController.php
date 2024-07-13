<?php
  
namespace App\Http\Controllers;

use App\Models\AccountSetting;
use App\Models\MemberSetting;
use App\Models\User;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
  
class SettingController extends Controller
{
    public function index(Request $request): View
    {
        $prefix = $request->route()->getPrefix();
        if (Auth::user()->type == 2) { // Member
            return view('member.dashboard',[
                'prefix' => str_replace('/','',$prefix)
            ]);
        } else {
            return view('admin.dashboard',[
                'prefix' => str_replace('/','',$prefix)
            ]);
        }
    }

    public function website()
    {
        $data = WebsiteSetting::first();
        return view('admin.settings.website',[
            'data' => $data
        ]);
    }

    public function websiteUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_title' => ['required'],
            'site_name' => ['required'],
            'site_url' => ['required'],
            'alias_name' => ['required'],
            'site_keywords' => ['required'],
            'site_desc' => ['required'],
            'from_name' => ['required'],
            'from_email' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $icon = null;
        $logo = null;
        if ($request->file('icon')) {
            $imgIcon = $request->file('icon');
            $filename = Carbon::now()->timestamp . '_' . $imgIcon->getClientOriginalName();
            $imgIcon->storeAs('public/uploads', $filename);
            $icon = $filename;
        }

        if ($request->file('logo')) {
            $imgLogo = $request->file('logo');
            $filename = Carbon::now()->timestamp . '_' . $imgLogo->getClientOriginalName();
            $imgLogo->storeAs('public/uploads', $filename);
            $logo = $filename;
        }

        $data = WebsiteSetting::first();
        if ($data) {
            $data->site_name = $request->site_name;
            $data->site_title = $request->site_title;
            $data->site_url = $request->site_url;
            $data->alias_name = $request->alias_name;
            $data->site_keywords =  $request->site_keywords;
            $data->site_desc = $request->site_desc;
            $data->from_name = $request->from_name;
            $data->from_email = $request->from_email;
            if ($icon != null) {
                $data->icon = $icon;
            }
            if ($logo != null) {
                $data->logo = $logo;
            }
            $data->cooking_consent = $request->cooking_consent;
            $data->member_website = $request->member_website;
            $data->logo_style = $request->logo_style;
            $data->save();
        } else {
            WebsiteSetting::create([
                'site_name' => $request->site_name,
                'site_title' => $request->site_title,
                'site_url' => $request->site_url,
                'alias_name' => $request->alias_name,
                'site_keywords' => $request->site_keywords,
                'site_desc' => $request->site_desc,
                'from_name' => $request->from_name,
                'from_email' => $request->from_email,
            ]);
        }

        return redirect()->route('admin.website.settings')->withSuccess('Record updated successfully!');

    }

    public function member()
    {
        $data = MemberSetting::first();
        return view('admin.settings.member',[
            'data' => $data
        ]);
    }

    public function memberUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'port' => ['required'],
            
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $default_pic = null;
        if ($request->file('default_pic')) {
            $imgIcon = $request->file('default_pic');
            $filename = Carbon::now()->timestamp . '_' . $imgIcon->getClientOriginalName();
            $imgIcon->storeAs('public/uploads', $filename);
            $default_pic = $filename;
        }

        $data = MemberSetting::first();
        if ($data) {
            $data->max_pic_width = $request->max_pic_width;
            $data->max_pic_height = $request->max_pic_height;
            $data->max_mem_site_title = $request->max_mem_site_title;
            $data->max_mem_site_desc = $request->max_mem_site_desc;
            $data->payplan_reg_option = $request->payplan_reg_option;
            if ($default_pic != null) {
                $data->default_pic = $default_pic;
            }
            $data->save();
        }

        return redirect()->back()->withSuccess('Record updated successfully!');
    }

    public function account()
    {
        $data = AccountSetting::first();
        return view('admin.settings.account',[
            'data' => $data
        ]);
    }

    public function accountUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'port' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'host' => ['required'],
            'username' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin_pic = null;
        if ($request->file('admin_pic')) {
            $imgIcon = $request->file('admin_pic');
            $filename = Carbon::now()->timestamp . '_' . $imgIcon->getClientOriginalName();
            $imgIcon->storeAs('public/uploads', $filename);
            $admin_pic = $filename;
        }

        $data = AccountSetting::first();
        if ($data) {
            $data->smtp_host = $request->host;
            $data->smtp_port = $request->port;
            $data->smtp_username = $request->smtp_username;
            $data->smtp_password = $request->smtp_password;
            if ($admin_pic != null) {
                $data->admin_pic = $admin_pic;
            }
            $data->save();
        }

        $user = User::find(Auth::user()->id);
        if ($user && $request->change_password == 1) {
            $user->password = Hash::make($request->password);
        }
        if ($request->username != null) {
            $user->username = $request->username;
        }
        $user->save();

        return redirect()->back()->withSuccess('Record updated successfully!');
    }
}