<?php
  
namespace App\Http\Controllers;

use App\Models\PayPlanLeader;
use App\Models\PayPlanStructure;
use App\Models\TermCondition;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
  
class TermConditionController extends Controller
{
    protected $termCondition;

    public function __construct(TermCondition $termCondition)
    {
        $this->termCondition = $termCondition;
    }

    public function edit()
    {
        $data = $this->termCondition->findFirst();
        return view('admin.termconditions.edit',[
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $data = $this->termCondition->findFirst();
        $data->content = $request->content;
        $data->save();
        return redirect()->back()->withSuccess('Record updated successfully!');
    }
}