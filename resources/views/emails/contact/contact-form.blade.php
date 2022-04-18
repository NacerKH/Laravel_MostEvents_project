@component('mail::message')
# Hello

<strong> You had a message from </strong> {{$data['name']}} <br><strong>Email::</strong>  ({{$data['email']}})
 <strong>Subject:</strong>{{$data['subject']}}
<hr>
<strong>Message:</strong>   <br>
{{$data['message']}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
