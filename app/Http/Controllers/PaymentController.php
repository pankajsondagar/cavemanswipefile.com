<?php
  
namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\PaymentOption;
use App\Models\PayPlanLeader;
use App\Models\User;
use App\Models\UserPayment;
use App\Notifications\MakePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
  
class PaymentController extends Controller
{
    protected $plans;

    public function __construct(PayPlanLeader $plans)
    {
        $this->plans = $plans;
    }

    /**
     * Make Payment
     * 
     * @param Request $request
     * @return View
     */
    public function view($planId,$id = null): View
    {
        $authMember = User::find($id ?? Auth::user()->id);
        $firstSponser = User::find($authMember->parent_id);
        if ($firstSponser) {
            $secondSponser = User::find($firstSponser->parent_id);
        }
        $plan = $this->plans->getById($planId);
        $amount = number_format($plan->intial_commission,2);
        $total = number_format($plan->reg_fee,2);
        $manualPayment = PaymentOption::first();
        $content = $manualPayment->content;
        $content = str_replace("[[payplan]]",$plan->name,$content);
        $content = str_replace("[[totamount]]",$plan->reg_fee,$content);
        $content = str_replace("[[currencysym]]",'$',$content);
        $content = str_replace("[[amount]]",$plan->intial_commission,$content);

        @$firstSponserManualPayment = PaymentOption::where('user_id',$firstSponser->id)->first();

        $content2 = @$firstSponserManualPayment->content;
        $content2 = str_replace("[[payplan]]",$plan->name,$content2);
        $content2 = str_replace("[[totamount]]",$plan->reg_fee,$content2);
        $content2 = str_replace("[[currencysym]]",'$',$content2);
        $content2 = str_replace("[[amount]]",$plan->intial_commission,$content2);

        @$secondSponserManualPayment = PaymentOption::where('user_id',$secondSponser->id)->first();
        $content3 = @$secondSponserManualPayment->content;
        $content3 = str_replace("[[payplan]]",$plan->name,$content3);
        $content3 = str_replace("[[totamount]]",$plan->reg_fee,$content3);
        $content3 = str_replace("[[currencysym]]",'$',$content3);
        $content3 = str_replace("[[amount]]",$plan->intial_commission,$content3);

        $adminPayment = UserPayment::where('user_id',$authMember->id)->where('type',1)->where('leader_id',$plan->id)->first();
        $firstSponserPayment = UserPayment::where('user_id',$authMember->id)->where('type',2)->where('leader_id',$plan->id)->first();
        $secondSponserPayment = UserPayment::where('user_id',$authMember->id)->where('type',3)->where('leader_id',$plan->id)->first();

        $paymentStatus = $this->getMemberPaymentStatus($authMember->id,$plan->id);

        $paymentOptionContent = Content::where('slug','payment-option')->first();

        return view('member.payments',[
            'plan' => $plan,
            'manualPayment' => $manualPayment,
            'content' => $content,
            'authMember' => $authMember,
            'isNormal' => $id ? false : true,
            'firstSponser' => @$firstSponser,
            'secondSponser' => @$secondSponser,
            'adminId' => User::where('type',1)->first(),
            'adminPayment' => $adminPayment,
            'firstSponserManualPayment' => $firstSponserManualPayment,
            'secondSponserManualPayment' => $secondSponserManualPayment,
            'content2' => $content2,
            'content3' => $content3,
            'firstSponserPayment' => $firstSponserPayment,
            'secondSponserPayment' => $secondSponserPayment,
            'paymentStatus' => $paymentStatus,
            'paymentOptionContent' => $paymentOptionContent,
            'amount' => $amount,
            'total' => $total
        ]);
    }

    public function confirmPayment(Request $request)
    {
        UserPayment::create([
            'sponser_id' => $request->sponser_id,
            'user_id' => $request->user_id,
            'leader_id' => $request->leader_id,
            'type' => $request->type,
            'message' => $request->message ?? '',
        ]);

        $user = User::find($request->user_id);
        $data = 'New Payment Request From ' . $user->firstname . ' ' . $user->lastname; 

        User::find(Auth::user()->id)->notify(new MakePayment($data));

        return redirect()->back()->withSuccess('Payment made successfully!');
    }

    public function approvePayment(Request $request)
    {
        $userPayement = UserPayment::find($request->id);
        $userPayement->is_confirm = 1;
        $userPayement->save();
        return redirect()->back()->withSuccess('Payment approved successfully!');
    }

    public function declinePayment(Request $request)
    {
        $userPayement = UserPayment::find($request->id);
        $userPayement->is_declined = 1;
        $userPayement->save();
        return redirect()->back()->withSuccess('Payment declined successfully!');
    }

    public function unapprovePayment(Request $request)
    {
        $userPayement = UserPayment::find($request->id);
        $userPayement->is_unapproved = 1;
        $userPayement->save();
        return redirect()->back()->withSuccess('Payment unapproved successfully!');
    }

    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}