<?php
  
namespace App\Http\Controllers;

use App\Models\MemberSetting;
use App\Models\Banner;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
  
class PageController extends Controller
{
    public function index(Request $request)
    {
        $memberSetting = MemberSetting::first();
        $prefix = $request->route()->getPrefix();
        if (Auth::user()->type == 2) { // Member
            return view('member.dashboard',[
                'prefix' => str_replace('/','',$prefix)
            ]);
        } else {
            $list = Page::latest()->simplePaginate(10);
            return view('admin.pages.browse',[
                'prefix' => str_replace('/','',$prefix),
                'list' => $list,
                'title' => @$request->title && @$request->submit == 'search' ? @$request->title : '',
                'filename' => @$request->filename && @$request->submit == 'search' ? @$request->filename : '',
                'note' => @$request->note && @$request->submit == 'search' ? @$request->note : '',
                'memberSetting' => $memberSetting
            ]);
        }
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.edit',[
            'page' => $page,
        ]);
    }

    public function update(Request $request)
    {
        try {
            $page = Page::find($request->id);
            if (!empty($request->title)) {
                $page->title = $request->title;
            }
            if (!empty($request->content)) {
                $page->content = $request->content;
            }
            $page->save();
            DB::commit();
            return redirect()->route('admin.page.list')->withSuccess('Page updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => ['required'],
                'content' => ['required'],
            ]);
    
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            Page::create([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => Str::slug($request->title),
            ]);     
            DB::commit();
            return redirect()->route('admin.page.list')->withSuccess('Page created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        $page = Page::find($id);
        if ($page) {
            $page->delete();
        }
        return redirect()->route('admin.page.list')->withSuccess('Page deleted successfully!');
    }
}