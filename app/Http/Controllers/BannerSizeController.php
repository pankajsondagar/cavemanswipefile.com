<?php
  
namespace App\Http\Controllers;

use App\Models\MemberSetting;
use App\Models\Banner;
use App\Models\BannerSize;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
  
class BannerSizeController extends Controller
{
    protected $banner;

    public function __construct(BannerSize $banner)
    {
        $this->banner = $banner;
    }

    public function index(Request $request)
    {
        $memberSetting = MemberSetting::first();
        $prefix = $request->route()->getPrefix();
        $list = BannerSize::latest()->simplePaginate(5);
        return view('admin.banner-size.browse',[
            'prefix' => str_replace('/','',$prefix),
            'list' => $list,
            'memberSetting' => $memberSetting
        ]);
    }

    public function create()
    {
        return view('admin.banner-size.create',[
        ]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            BannerSize::create([
                'title' => $request->size,
            ]);

            DB::commit();
            return redirect()->route('admin.banner.size.list')->withSuccess('Banner size created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        $banner = BannerSize::find($id);
        if ($banner) {
            $banner->delete();
        }
        return redirect()->route('admin.banner.size.list')->withSuccess('Banner size deleted successfully!');
    }

    public function edit($id)
    {
        $banner = BannerSize::find($id);
        return view('admin.banner-size.edit',[
            'banner' => $banner,
        ]);
    }

    public function update(Request $request)
    {
        try {
            $banner = BannerSize::find($request->id);
            if (!empty($request->title)) {
                $banner->title = $request->title;
            }
            $banner->save();
            DB::commit();
            return redirect()->route('admin.banner.size.list')->withSuccess('Banner size updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }
}