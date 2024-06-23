<?php
  
namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
  
class NotificationController extends Controller
{
    protected $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Index
     */
    public function index(): View
    {
        $list = $this->notification->getList();
        return view('admin.notifications.list',[
            'list' => $list
        ]);
    }

    /**
     * Edit
     * 
     * @param int $id
     * @return View
     */
    public function edit($id): View
    {
        $data = $this->notification->getById($id);
        return view('admin.notifications.edit',[
            'data' => $data
        ]);
    }

    /**
     * Update
     * 
     * @param Request $request
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'subject' => ['required'],
            'description' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $this->notification->getById($request->id);
        if ($data) {
            $data->name = $request->name;
            $data->subject = $request->subject;
            $data->description = $request->description;
            if ($request->status) {
                $data->status = $request->status;
            }
            if ($request->copy_to_admin) {
                $data->copy_to_admin = $request->copy_to_admin;
            }
            $data->save();
        }
        return redirect()->route('admin.notification.list')->withSuccess('Record updated successfully!');
    }
}