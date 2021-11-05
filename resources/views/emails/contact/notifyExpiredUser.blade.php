@component('mail::message')
# Hello {{$data['name']}}

<strong> You had a message from </strong> {{ config('app.name') }} <br><strong>Email::</strong>  ({{$data['email']}})
 <strong>Subject:</strong>{{$data['subject']}}
<hr>
<strong>Message:</strong>   <br>
{{$data['message']}}

@component('mail::button', ['url' => ''])
subscribe again 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
