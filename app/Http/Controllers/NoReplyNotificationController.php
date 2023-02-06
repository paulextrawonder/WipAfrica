<?php

namespace App\Http\Controllers;

use App\Models\Notifier;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

use function PHPUnit\Framework\isEmpty;

class NoReplyNotificationController extends Controller
{
    public function user()
    {
        return Auth::user();
    }

    public function allMessages()
    {  

       $all = Notifier::where('created_at', '>=', $this->user()->created_at)->orderBy('id', 'desc')->get();
        $data['notifications'] = $all;
        $data['count'] = $all->count();

        return view('user.notification', compact('data'));
    }

    public function singleMessages($id)
    {
        $message = $this->user()->notifications->where('id',$id);
        if($message->isEmpty()){
            return $this->sendError('ERROR', ['error'=>'Not found']);
        }

        $this->markAsRead($message);

        return $message;
    }

    public function markAsRead($instance)
    {
        return $instance->markAsRead();
    }

    public function unreadMessages()
    {
        $messages = $this->user()->unreadNotifications;
        if($messages->isEmpty()){
            return $this->sendError('ERROR', ['error'=>'No unread message']);
        }
        $data['unread'] = $messages;
        $data['count'] = $messages->count();

        return $this->sendResponse($data, 'success');
    }
    public function readMessages()
    {
        $message = $this->user()->readNotifications;
        if($message->isEmpty()){
            return $this->sendError('ERROR', ['error'=>'No read message']);
        }

        $data['read'] = $message;
        $data['count'] = $message->count();

        return $this->sendResponse($data, 'success');
        
    }

    public function destroyMessage($id)
    {
        $delete = $this->user()->notifications->where('id',$id)->first();

        if(!$delete){
            return $this->sendError('error', ['error'=>'Operation could not be completed']);
        }

        $delete->delete();
        return $this->sendResponse([], 'Deleted suscessfully');
        
    }

    public function adminView()
    {
        $data = Notifier::all();

        return view('admin.notification', compact('data'));
    }

    
    public function createNotification(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'message'=>'required'
        ]);

        $data['admin_id'] = auth()->guard('admin')->user()->id;

         try{
            Notifier::create($data);
         }catch(Exception $e){
            return back()->with('error', $e->getMessage());
         }

         return back()->with('success', 'Notification sent successfully');

    }

    public function deleteNotification(Notifier $id)
    {
        try{
            $id->delete();
        }catch(Exception $e){
            return back()->with('error', 'Unknown error occured');
        }

        return back()->with('success', 'Notification deleted successfully');
    }
    
}
