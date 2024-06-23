<?php
  
namespace App\Http\Controllers;

use App\Models\MemberSetting;
use App\Models\DigitalDownload;
use App\Models\PayPlanLeader;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
  
class DigitalDownloadController extends Controller
{

    public function index(Request $request)
    {
        $memberSetting = MemberSetting::first();
        $prefix = $request->route()->getPrefix();
        if ($request->submit == 'search') {
            $list = DigitalDownload::latest();

            if ($request->filled('title')) {
                $list->where('title', 'like', '%' . $request->title . '%');
            }

            if ($request->filled('filename')) {
                $list->where('filename', 'like', '%' . $request->filename . '%');
            }

            if ($request->filled('note')) {
                $list->where('note', 'like', '%' . $request->note . '%');
            }

            $list = $list->simplePaginate(5);
        } else {
            $list = DigitalDownload::latest()->simplePaginate(5);
        }
        return view('admin.digital-downloads.browse',[
            'prefix' => str_replace('/','',$prefix),
            'list' => $list,
            'title' => @$request->title && @$request->submit == 'search' ? @$request->title : '',
            'filename' => @$request->filename && @$request->submit == 'search' ? @$request->filename : '',
            'note' => @$request->note && @$request->submit == 'search' ? @$request->note : '',
            'memberSetting' => $memberSetting,
        ]);
    }

    public function create()
    {
        return view('admin.digital-downloads.create',[
        ]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $path = null;
            if ($request->file('path')) {
                $filePath = $request->file('path');
                $filename = Carbon::now()->timestamp . '_' . $filePath->getClientOriginalName();
                $filePath->storeAs('public/uploads', $filename);
                $path = $filename;
                $fileSize = $filePath->getSize();
            }

            $image = null;
            if ($request->file('image')) {
                $imageFile = $request->file('image');
                $filename = Carbon::now()->timestamp . '_' . $imageFile->getClientOriginalName();
                $imageFile->storeAs('public/uploads', $filename);
                $image = $filename;
            }

            DigitalDownload::create([
                'name' => $request->name,
                'payplan' => json_encode($request->payplan),
                'availabilty' => $request->availabilty,
                'status' => $request->status,
                'description' => $request->description,
                'path' => $path,
                'file_size' => $fileSize ?? null,
                'image' => $image,
                'file_name' => @$filePath->getClientOriginalName() ?? null,
            ]);
            

            DB::commit();
            return redirect()->route('admin.digital.download.list')->withSuccess('Digital download created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        $digitalDownload = DigitalDownload::find($id);
        $this->commonDelete($digitalDownload->path);
        if ($digitalDownload) {
            $digitalDownload->delete();
        }
        return redirect()->route('admin.digital.download.list')->withSuccess('Digital download deleted successfully!');
    }

    public function edit($id)
    {
        $digitalDownload = DigitalDownload::find($id);
        $payplanArr = json_decode($digitalDownload->payplan,true);
        return view('admin.digital-downloads.edit',[
            'data' => $digitalDownload,
            'payplanArr' => $payplanArr ?? [],
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $digitalDownload = DigitalDownload::find($request->id);
            $path = $digitalDownload->path;
            $fileSize = $digitalDownload->file_size;
            if ($request->file('path')) {
                $filePath = $request->file('path');
                $filename = Carbon::now()->timestamp . '_' . $filePath->getClientOriginalName();
                $filePath->storeAs('public/uploads', $filename);
                $path = $filename;
                $fileSize = $filePath->getSize();
            }

            $image = $digitalDownload->image;
            if ($request->file('image')) {
                $imageFile = $request->file('image');
                $filename = Carbon::now()->timestamp . '_' . $imageFile->getClientOriginalName();
                $imageFile->storeAs('public/uploads', $filename);
                $image = $filename;
            }
            $digitalDownload->name = $request->name;
            $digitalDownload->description = $request->description;
            $digitalDownload->availabilty = $request->availabilty;
            $digitalDownload->status = $request->status;
            $digitalDownload->payplan = json_encode($request->payplan);
            $digitalDownload->path = $path;
            $digitalDownload->image = $image;
            $digitalDownload->file_size = $fileSize;
            $digitalDownload->save();

            DB::commit();
            return redirect()->route('admin.digital.download.list')->withSuccess('Digital download updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function memberList(Request $request, $id = null)
    {
        $authMember = User::find($id ?? Auth::user()->id);
        $paymentStatus = $this->getMemberPaymentStatus($authMember->id,$request->plan);
        //if ($paymentStatus) {
            $list = DigitalDownload::whereJsonContains("payplan",$request->plan)->latest()->simplePaginate(5);
        //}
        $plans = PayPlanLeader::pluck('name','id')->toArray();
        return view('member.digital-downloads.index',[
            'authMember' => $authMember,
            'isNormal' => $id ? false : true,
            'list' => @$list,
            'plans' => $plans,
            'plan' => $request->plan,
            'isActivePlan' => true,
        ]);
    }
}