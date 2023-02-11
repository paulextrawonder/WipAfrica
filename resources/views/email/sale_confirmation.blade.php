@component('mail::message')
# Hi, {{$user['first_name']}}
<br>Congratulations✅
<br><br>Your payment of {{ $data['amount'] }} has been confirmed.
<br>You've received a commission of <strong>{{$data['commission_amount']}}</strong>.
<br><br>Login into your dashboard to see your accumulated commissions.
<br>
@component('mail::button', ['url' => config('app.url').'/user/dashboard' ])
Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
