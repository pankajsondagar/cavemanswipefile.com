<?php
  
namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\MemberSetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MemberAffiliateController extends Controller
{
    public function affiliate($id = null)
    {
        $memberSetting = MemberSetting::first();
        $authMember = User::with('parent')->find($id ?? Auth::user()->id);
        if ($authMember->hashed_username == null) {
            $hashedUsername = Str::random(50);
            $authMember->hashed_username = $hashedUsername;
            $authMember->save();
        } else {
            $hashedUsername = $authMember->hashed_username;
        }
        return view('member.affiliate',[
            'memberSetting' => $memberSetting,
            'authMember' => $authMember,
            'isNormal' => $id ? false : true,
            'url' => env('APP_URL'). 'home/'. @$hashedUsername
        ]);
    }

    public function video($id = null) 
    {
        $memberSetting = MemberSetting::first();
        $authMember = User::find($id ?? Auth::user()->id);
        $videoURL = Content::where('slug','youtube-url')->first();
        return view('member.videos',[
            'memberSetting' => $memberSetting,
            'authMember' => $authMember,
            'isNormal' => $id ? false : true,
            'videoURL' => $videoURL,
        ]);
    }
}