@component('mail::message')

Hello,
<strong>Email : {{ $details->email }}</strong><br>
<strong>Name : {{ $details->name }}</strong><br>
<strong>Subject : {{ $details->subject }}</strong><br>
<hr>
<p>Message</p>
<hr>
<p>
    {{ $details->comment }}
</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
