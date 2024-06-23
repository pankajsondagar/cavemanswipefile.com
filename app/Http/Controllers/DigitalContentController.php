<?php
  
namespace App\Http\Controllers;

use App\Models\MemberSetting;
use App\Models\DigitalContent;
use App\Models\DigitalDownload;
use App\Models\PayPlanLeader;
use App\Models\User;
use App\Models\UserPayment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
  
class DigitalContentController extends Controller
{
    public function index(Request $request)
    {
        $memberSetting = MemberSetting::first();
        $prefix = $request->route()->getPrefix();
        $list = DigitalContent::latest()->simplePaginate(5);

        // Define your mappings
        $planNames = PayPlanLeader::pluck('name','id')->toArray();

        foreach($list as $key => $value) {
            $decoded = json_decode($value->payplan, true); // Decode the JSON string

            $formattedPlans = [];
            if (!empty($decoded)) {
                foreach ($decoded as $planId) {
                    if (isset($planNames[$planId])) {
                        $formattedPlans[] = "{$planNames[$planId]}";
                    }
                }
            }   

            $list[$key]['payplanText'] = implode(', ', $formattedPlans);
        }
        
        return view('admin.digital-contents.browse',[
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
        return view('admin.digital-contents.create',[
        ]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_id' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            DigitalContent::create([
                'page_id' => $request->page_id,
                'menu_name' => $request->menu_name,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'content' => $request->content,
                'availabilty' => $request->availabilty,
                'status' => $request->status,
                'payplan' => json_encode($request->payplan),
            ]);

            DB::commit();
            return redirect()->route('admin.digital.content.list')->withSuccess('Digital content created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        $digitalContent = DigitalContent::find($id);
        if ($digitalContent) {
            $digitalContent->delete();
        }
        return redirect()->route('admin.digital.content.list')->withSuccess('Digital content deleted successfully!');
    }

    public function edit($id)
    {
        $digitalContent = DigitalContent::find($id);
        $payplanArr = json_decode($digitalContent->payplan,true);
        return view('admin.digital-contents.edit',[
            'data' => $digitalContent,
            'payplanArr' => $payplanArr ?? [],
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $digitalContent = DigitalContent::find($request->id);
            $digitalContent->menu_name = $request->menu_name;
            $digitalContent->title = $request->title;
            $digitalContent->subtitle = $request->subtitle;
            $digitalContent->content = $request->content;
            $digitalContent->availabilty = $request->availabilty;
            $digitalContent->status = $request->status;
            $digitalContent->payplan = json_encode($request->payplan);
            $digitalContent->save();

            DB::commit();
            return redirect()->route('admin.digital.content.list')->withSuccess('Digital content updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function memberList(Request $request, $id = null)
    {
        $authMember = User::find($id ?? Auth::user()->id);
        $list = DigitalContent::whereJsonContains("payplan",$request->plan)->latest()->simplePaginate(5);
        $plans = PayPlanLeader::pluck('name','id')->toArray();
        $arr = [];
        foreach ($plans as $key => $value) {
            $paymentStatus = $this->getMemberPaymentStatus($authMember->id,$key);
            if ($paymentStatus) {
                $arr[$key] = $value;
            }
        }
        return view('member.digital-content.index',[
            'authMember' => $authMember,
            'isNormal' => $id ? false : true,
            'list' => @$list,
            'plans' => $arr,
            'plan' => $request->plan,
        ]);
    }

    public function updateDownloadCount(Request $request)
    {
        $data = DigitalDownload::find($request->id);
        $count = $data->count;
        $data->count = $count + 1;
        $data->save();
        return response()->json($data);
    }
}