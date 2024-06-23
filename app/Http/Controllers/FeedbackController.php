<?php
  
namespace App\Http\Controllers;

use App\Mail\FeedbackReply;
use App\Models\AccountSetting;
use App\Models\AdminFeedback;
use App\Models\MemberSetting;
use App\Models\PayPlanLeader;
use App\Models\Banner;
use App\Models\Feedback;
use App\Models\Notification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
  
class FeedbackController extends Controller
{
    protected $feedback;
    protected $memberSetting;
    protected $notification;

    public function __construct(Feedback $feedback, MemberSetting $memberSetting,Notification $notification)
    {
        $this->feedback = $feedback;
        $this->notification = $notification;
        $this->memberSetting = $memberSetting;
    }

    public function list()
    {
        $list = $this->feedback->list();
        $memberSetting = $this->memberSetting->findFirst();
        return view('admin.feedbacks.list',[
            'list' => $list,
            'memberSetting' => $memberSetting
        ]);
    }

    public function replyForm($id)
    {
        $feedback = $this->feedback->findById($id);
        $memberSetting = $this->memberSetting->findFirst();
        return view('admin.feedbacks.reply',[
            'feedback' => $feedback,
            'memberSetting' => $memberSetting
        ]);
    }

    public function saveReply(Request $request)
    {
        if (!empty($request->reply)) {
            AdminFeedback::create([
                'feedback_id' => $request->id,
                'reply' => $request->reply
            ]);

            $feedback = $this->feedback->findById($request->id);
            $feedback->has_replied = 1;
            $feedback->save();

            $emailTemplate = $this->notification->getBySlug('feedback_reply');
            $content = $emailTemplate->description;
            $user = $feedback->user;
            $content = str_replace("[[firstname]]",$user->firstname,$content);
            $content = str_replace("[[message]]",$request->reply,$content);
            $subject = $emailTemplate->subject;
            $body = [
                'content' => $content,
                'subjectContent' => $subject
            ];

            try {
                Mail::to($feedback->user->email)->send(new FeedbackReply($body));
            } catch (Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            }
        }

        return back();
    }
}