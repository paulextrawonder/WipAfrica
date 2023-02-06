<?php

namespace App\Http\Controllers;

use App\Helpers\GenerateRandomString;
use App\Helpers\Validation;
use App\Mail\SupportNotificationMail;
use App\Models\Support;
use App\Models\SupportResponse;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SupportController extends Controller
{

    public function user()
    {
        return Auth::user();
    }

    public function getSupportTicket()
    {
          try{
            $tickets = Support::where('user_id', $this->user()->id)
                ->orderBy('id', 'desc')->get();

                foreach($tickets as $key=>$ticket){
                    $ticket['who_replied'] = SupportResponse::select('is_admin', 'supports_id')
                    ->where('supports_id', $ticket->id)
                    ->orderBy('id', 'desc')
                    ->first() ?? ['is_admin'=>0];
                }

        }catch(Exception $e){

            return back()->with('error', 'ERROR! OCCURRED');
        }
        
        return view('user.support', compact('tickets'));
    }

    public function createSupportTicket(Request $request)
    {
        $helper = new Validation;
       $data =  $helper->createSupportTicket($request);

       $getString = new GenerateRandomString;
       $string = $getString->getString(10);

        $data['user_id'] = $this->user()->id;
        $data['ticket'] = $string;

        if(!empty($data['attachment']))
        {
           $data['attachment'] = $string.'.'.Carbon::now()->format('ymdhsi').'.'.$data['attachment']->extension();
           $request['attachment']->move(public_path('/users/tickets/'), $data['attachment']);
        }

        try {
            Support::create($data);
            Mail::to(config('app.admin_email_address'))->send(new SupportNotificationMail(Auth::user(), $data));
        } catch (Exception $e) {
           return back()->with('error', 'Some error occured'.$e->getMessage());
        }

        return back()->with('success', 'Support ticket created successfully');
        
    }

    public function setTicketAsClosed($support_id)
    {
        try{
         $ticket =  Support::where('id', $support_id)
            ->where('user_id', $this->user->id)
            ->where('user_type', $this->GetUserType())->first();

            if(empty($ticket)){
            return $this->sendError('error', ['error'=>'Ticket not found']);
            }

            $ticket->update(['status'=> 'closed']);
        }catch(Exception $e){

        return $this->sendError('error', ['error'=>$e->getMessage()]);
        }

        return $this->sendResponse('Ticket marked as closed', 'success');

    }
    protected function generateTicketCode() {      
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $ticket = "";
        for ($i=0; $i < 10; $i++) { 
            $index = rand(0, strlen($chars)-1);
            $ticket .= $chars[$index];
        }
        return $ticket;
    }

    public function showSupportTicket($support_id)
    {

        $data = [];
        try{
             $ticket = Support::where('id', $support_id)
            ->where('user_id', $this->user()->id)
            ->first();

            if(!$ticket){
                return redirect(route('getSupportTicket'))->with('error', 'No such ticket');
            }

        }catch(Exception $e){
            return back()->with('error', 'Error occured');
        }

        $data['ticket'] = $ticket;
        $data['replies'] = $this->getSupportTicketReplies($support_id);

       return view('user.view-support-ticket', compact('data'));
    }

    public function getSupportTicketReplies($support_id)
    {        
        try {
            $response = SupportResponse::join('supports', 'supports.id', 'support_responses.supports_id')
            ->where('supports_id', $support_id)
            ->where('user_id', $this->user()->id)
            ->orWhere('user_id', 0)->get();
        } catch (Exception $e) {
          
          return back()->with('error', 'Something went wrong');
            
        }

        return $response;
   
    }

    public function ceateSupportTicketReplies($support_id, Request $request)
    {
        $check = Support::where('id', $support_id)
            ->where('user_id', $this->user()->id)
            ->first();

        if(empty($check)){
            return back()->with('error', 'Ticket not found');
        }

        if($check->action == 'closed'){
            return back()->with('error', 'Cannot reply to a closed ticket');
        }

        $data = $request->validate([
            'reply' =>['required'],
            'reply_attachment'=>['mimes:png,jpg,jpeg'],
        ]);

        if(!empty($data['reply_attachment']))
        {
            $getString = new GenerateRandomString;
            $string = $getString->getString(10);
            
           $data['reply_attachment'] = $string.'.'.Carbon::now()->format('ymdhsi').'.'.$data['reply_attachment']->extension();
           $request['reply_attachment']->move(public_path('/users/tickets/'), $data['reply_attachment']);
        }

        $data['supports_id'] = $support_id;
        $data['is_admin'] = 0;

        try {
            SupportResponse::create($data);           
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }

        return back()->with('success', 'You have replied to your ticket');

    }

    public function deleteSupportTicket($support_id)
    {
        try {

        $ticket = Support::where('id', $support_id)
            ->where('user_id', $this->user->id)
            ->where('user_type', $this->GetUserType())->first();

        if(empty($ticket))
        {
          return $this->sendError('error', ['error'=>'Ticket not found']);
        }

        $ticket->delete();

        } catch (Exception $e) {
            return $this->sendError('Error', ['error'=>$e->getMessage()]);
        }

        return $this->sendResponse('Ticket deleted successfully', 'success');
    }

    public function adminSupportView()
    {
        try{
            $tickets = Support::orderBy('created_at', 'DESC')->get();
            foreach($tickets as $key=>$ticket){
                $ticket['who_replied'] = SupportResponse::select('is_admin', 'supports_id')
                ->where('supports_id', $ticket->id)
                ->orderBy('id', 'desc')
                ->first() ?? ['is_admin'=>0];
            }

        }catch(Exception $e){

            return back()->with('error', 'ERROR! OCCURRED');
        }

        return view('admin.support', compact('tickets'));
    }

    public function viewTicket(Support $id)
    {
        $data = [];
        $ticket = $id->select(
            "supports.id",
            "user_id",
            "subject",
            "message",
            "ticket",
            "attachment",
            "status",
            "action",
            "first_name",
            "last_name",
            "email",
            "profile_pic",
        )->join('users', 'users.id', 'supports.user_id')
        ->where('supports.id', $id->id)
        ->first();

        $response = SupportResponse::join('supports', 'supports.id', 'support_responses.supports_id')
            ->where('supports_id', $ticket->id)
            ->orWhere('user_id', 0)->get();

        $data['ticket'] = $ticket;
        $data['replies'] = $response;

        return view('admin.view-support', compact('data'));
    }

    public function markTicketAsClosed(Support $id, Request $request)
    {
        try{
            $id->update(['action'=> $request['ticket_action']]);
        }catch(Exception $e){
            return back()->with('error', 'Something went wrong');
        }

        return back()->with('success', 'Ticket has been marked as '.Str::ucfirst($request['ticket_action']));
    }
    
    public function adminReplyTicket(Support $ticket, Request $request)
    {
        if($ticket->action == 'closed'){
            return back()->with('error', 'Cannot reply to a closed ticket');
        }

        $data = $request->validate([
            'reply' =>['required'],
            'reply_attachment'=>['mimes:png,jpg,jpeg'],
        ]);

        if(!empty($data['reply_attachment']))
        {
            $getString = new GenerateRandomString;
            $string = $getString->getString(10);
            
           $data['reply_attachment'] = $string.'.'.Carbon::now()->format('ymdhsi').'.'.$data['reply_attachment']->extension();
           $request['reply_attachment']->move(public_path('/users/tickets/'), $data['reply_attachment']);
        }

        $data['supports_id'] = $ticket->id;
        $data['is_admin'] = 1;

        try {
            SupportResponse::create($data);           
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }

        return back()->with('success', 'You have replied a ticket');
    }
}
