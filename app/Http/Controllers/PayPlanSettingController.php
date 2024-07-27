<?php
  
namespace App\Http\Controllers;

use App\Models\PayPlanLeader;
use App\Models\PayPlanStructure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
  
class PayPlanSettingController extends Controller
{
    public function structure()
    {
        $data = PayPlanStructure::first();
        return view('admin.payplan.structure',[
            'data' => $data
        ]);
    }

    public function structureUpdate(Request $request)
    {
        $data = PayPlanStructure::first();
        $data->level_width = $request->level_width;
        $data->level_depth = $request->level_depth;
        $data->symbol = $request->symbol;
        $data->code = $request->code;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->reminder = $request->reminder;
        $data->save();

        return redirect()->back()->withSuccess('Record updated successfull!');
    }

    public function leader($type)
    {
        $data = PayPlanLeader::where('type',$type)->first();
        $planType = match($type) {
            '1' => 'Bronze',
            '2' => 'Sliver',
            '3' => 'Gold',
            '4' => 'Platinum',
            '5' => 'Diamond',
        };
        return view('admin.payplan.leader',[
            'data' => $data,
            'planType' => $planType
        ]);
    }

    public function leaderUpdate(Request $request)
    {   
        $validator = Validator::make($request->all(), [
           'name' => ['required'],
           'description' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $logo = null;
        if ($request->file('logo')) {
            $imgIcon = $request->file('logo');
            $filename = Carbon::now()->timestamp . '_' . $imgIcon->getClientOriginalName();
            $imgIcon->storeAs('public/uploads', $filename);
            $logo = $filename;
        }

        $header_img = null;
        if ($request->file('header_img')) {
            $imgIcon = $request->file('header_img');
            $filename = Carbon::now()->timestamp . '_' . $imgIcon->getClientOriginalName();
            $imgIcon->storeAs('public/uploads', $filename);
            $header_img = $filename;
        }

        $data = PayPlanLeader::where('id',$request->id)->first();
        if ($data) {
            $data->name = $request->name;
            $data->description = $request->description;
            $data->reg_fee = $request->reg_fee;
            $data->renewal_fee = $request->renewal_fee;
            $data->membership_interval = $request->membership_interval;
            $data->member_as_vendor = $request->member_as_vendor ?? 0;
            $data->allow_inactive = $request->allow_inactive ?? 0;
            $data->status = $request->status;
            $data->intial_commission = $request->intial_commission;
            if ($logo != null) {
                $data->logo = $logo;
            }
            if ($header_img != null) {
                $data->header_img = $header_img;
            }
            $data->save();
        }

        return redirect()->back()->withSuccess('Record updated successfully!');
    }
}