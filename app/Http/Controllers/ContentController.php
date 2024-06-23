<?php
  
namespace App\Http\Controllers;

use App\Models\MemberSetting;
use App\Models\Banner;
use App\Models\Content;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
  
class ContentController extends Controller
{
    protected $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function list()
    {
        $paymentOption = $this->content->findBySlug('payment-option');
        $adminURL = $this->content->findBySlug('admin-url');
        $videoURL = $this->content->findBySlug('youtube-url');
        $registerMsg = $this->content->findBySlug('register-msg');
        return view('admin.content.list',[
            'paymentOption' => $paymentOption,
            'adminURL' => $adminURL,
            'videoURL' => $videoURL,
            'registerMsg' => $registerMsg
        ]);
    }

    public function update(Request $request)
    {
        foreach($request->slug as $key => $slug) {
            $data = $this->content->findBySlug($slug);
            $data->content = $request->content[$key];
            $data->save();   
        }

        return redirect()->back()->withSuccess('Content updated succesfully!');
    }
}