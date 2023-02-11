@component('mail::message')
# Hi, {{$user['first_name']}}

You have 1 new notification.

<strong>{{$data['title']}}</strong>

<em>{{$data['message']}}</em>

@component('mail::button', ['url' => config('app.url').'/user/dashboard' ])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
