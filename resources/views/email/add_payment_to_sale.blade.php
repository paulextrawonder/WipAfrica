@component('mail::message')
Hi Admin,
<br> A new payment has been made.
<br> Please find details below:
<br> Realtor Information: 
    <br> ---------------------<br>
   Name: {{$user['first_name']}} {{$user['last_name']}}
   <br>Email:{{ $user['email']}}
   <br>Ref : {{$user['ref_code']}}
   <br>
   Amount added: {{$amount}}
    <br> ---------------------<br>
<br> 
Pls login to your dashboard to Approve, Decline or Cancel sale.
<br>Don't keep your customers waiting..
{{ config('app.name') }}
@endcomponent
