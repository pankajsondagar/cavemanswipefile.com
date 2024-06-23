<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use App\Models\UserPayment;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function page($slug)
    {
        $page = Page::where('slug',$slug)->first();
        $pages = Page::whereNotIn('slug',['mlm-leads','comp-plan'])->get();
        return view('page',['page' => $page,'pages' => $pages]);
    }

    public function welcome($hashedUsername = null)
    {
        // Delete users which are created 24 hours before
        $users = User::where('type',2)->where('status',0)->get();
        foreach ($users as $user) {
            $createdAt = Carbon::parse($user->created_at);
            $twentyFourHoursAgo = Carbon::now()->subHours(24);

            if ($createdAt->lt($twentyFourHoursAgo)) {
                $user = User::find($user->id);
                $user->delete();
            }
        }

        $pages = Page::whereNotIn('slug',['mlm-leads','comp-plan'])->get();
        return view('welcome',[
            'pages' => $pages,
            'hashedUsername' => $hashedUsername
        ]);
    }

    public function getMemberPaymentStatus($memberId,$planId)
    {
        $count = UserPayment::where('user_id',$memberId)
                ->where('leader_id',$planId)
                ->where('is_confirm',1)
                ->count();
        return $count == 3 ? true : false;
    }

    public function commonDelete($fileName)
    {
        $filePathToDelete = 'public/uploads/' . $fileName;
        if (Storage::exists($filePathToDelete)) {
            Storage::delete($filePathToDelete);
        }
    }
}
