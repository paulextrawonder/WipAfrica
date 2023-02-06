@component('mail::message')
Hi {{$name}},
<br> A new project has been uploaded.
<br> Please find details below:
<br> Property Information: 
    <br> ---------------------<br>
   Estate: {{$data['estate_name']}}
   <br>Project type:{{ $data['property_type']}}
   <br>Project name:{{ $data['property_name']}}
   <br>Location:{{ $data['location']}}
   <br>Total Price : {{$data['amount']}}
   <br>Commission : {{$data['commission']}}
    <br> ---------------------<br>
<br> 
Pls login to your dashboard to get more project details and materials.
<br><br>
Thank you
<br>
{{ config('app.name') }}
@endcomponent
