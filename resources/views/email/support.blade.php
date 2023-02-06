@component('mail::message')
Hi Admin,
<br> A new support ticket has been created.
<br> Please find details below:
<br> Realtor Information: 
    <br> ---------------------<br>
   Name: {{$user['first_name']}} {{$user['last_name']}}
   <br>Email:{{ $user['email']}}
   <br>Ref : {{$user['ref_code']}}
   <br>
   Subject: {{$data['subject']}}
   <br>Message: {{$data['message']}}
   <br>Ticket code: {{$data['ticket']}}
    <br> ---------------------<br>
<br> 
Pls login to your dashboard to respond to this ticket.
<br>Don't keep your customers waiting..
{{ config('app.name') }}
@endcomponent
