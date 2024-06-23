<?php
  
namespace App\Http\Controllers;

use App\Models\MemberSetting;
use App\Models\Banner;
use App\Models\BannerSize;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
  
class BannerController extends Controller
{
    protected $banner;
    protected $user;

    public function __construct(Banner $banner, User $user)
    {
        $this->banner = $banner;
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $sizeList = BannerSize::pluck('title','id')->toArray();
        $memberSetting = MemberSetting::first();
        $prefix = $request->route()->getPrefix();
        if ($request->submit == 'search') {
            $list = Banner::with('size')->latest();

            if ($request->filled('title')) {
                $list->where('title', 'like', '%' . $request->title . '%');
            }

            if ($request->filled('filename')) {
                $list->where('filename', 'like', '%' . $request->filename . '%');
            }

            if ($request->filled('note')) {
                $list->where('note', 'like', '%' . $request->note . '%');
            }

            if ($request->filled('size_id')) {
                $list->where('size_id', $request->size_id);
            }

            $list = $list->simplePaginate(5);
        } else {
            $list = Banner::with('size')->latest()->simplePaginate(5);
        }
        return view('admin.banners.browse',[
            'prefix' => str_replace('/','',$prefix),
            'list' => $list,
            'title' => @$request->title && @$request->submit == 'search' ? @$request->title : '',
            'filename' => @$request->filename && @$request->submit == 'search' ? @$request->filename : '',
            'note' => @$request->note && @$request->submit == 'search' ? @$request->note : '',
            'memberSetting' => $memberSetting,
            'sizeList' => $sizeList,
            'size_id' => @$request->size_id && @$request->submit == 'search' ? @$request->size_id : '',
        ]);
    }

    public function memberList(Request $request, $id =null)
    {
        $user = $this->user->findById($id ?? Auth::user()->id);
        if ($request->submit == 'search') {
            $list = Banner::with('size')->latest();

            if ($request->filled('title')) {
                $list->where('title', 'like', '%' . $request->title . '%');
            }

            if ($request->filled('filename')) {
                $list->where('filename', 'like', '%' . $request->filename . '%');
            }

            if ($request->filled('note')) {
                $list->where('note', 'like', '%' . $request->note . '%');
            }

            if ($request->filled('size_id')) {
                $list->where('size_id', $request->size_id);
            }

            $list = $list->get();
        } else {
            $list = Banner::with('size')->latest()->get();
        }
        $sizeList = BannerSize::pluck('title','id')->toArray();
        return view('member.banner_list',[
            'list' => $list,
            'authMember' => $user,
            'isNormal' => $id ? false : true,
            'sizeList' => $sizeList,
            'size_id' => @$request->size_id && @$request->submit == 'search' ? @$request->size_id : '',
        ]);
    }

    public function create()
    {
        $sizeList = BannerSize::pluck('title','id')->toArray();
        return view('admin.banners.create',[
            'sizeList' => $sizeList
        ]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $image = null;
            if ($request->file('image')) {
                $imgIcon = $request->file('image');
                $filename = Carbon::now()->timestamp . '_' . $imgIcon->getClientOriginalName();
                $imgIcon->storeAs('public/uploads', $filename);
                $image = $filename;
            }

            Banner::create([
                'image' => $image,
                'status' => 1,
                'filename' => $imgIcon->getClientOriginalName(),
                'size_id' => $request->size_id,
            ]);

            DB::commit();
            return redirect()->route('admin.banner.list')->withSuccess('Banner created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $this->commonDelete($banner->image);
        if ($banner) {
            $banner->delete();
        }
        return redirect()->route('admin.banner.list')->withSuccess('Banner deleted successfully!');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        $sizeList = BannerSize::pluck('title','id')->toArray();
        return view('admin.banners.edit',[
            'banner' => $banner,
            'sizeList' => $sizeList,
        ]);
    }

    public function update(Request $request)
    {
        try {
            $banner = Banner::find($request->id);
            if (!empty($request->title)) {
                $banner->title = $request->title;
            }
            if (!empty($request->note)) {
                $banner->note = $request->note;
            }
            $banner->status = $request->status;
            $banner->size_id = $request->size_id;
            $banner->save();
            DB::commit();
            return redirect()->route('admin.banner.list')->withSuccess('Banner updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }
}