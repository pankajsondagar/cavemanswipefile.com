<?php
  
namespace App\Http\Controllers;

use App\Models\PaymentOption;
use Illuminate\Http\Request;
  
class PaymentOptionController extends Controller
{
    public function edit()
    {
        $data = PaymentOption::first();
        return view('admin.payment_options.edit',[
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $data = PaymentOption::first();
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();
        return redirect()->back()->withSuccess('Record updated successfully!');
    }
}