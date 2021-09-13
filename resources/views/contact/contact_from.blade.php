@component('mail::message')
<h3>New Message{{ $contact_from['name'] }}</h3>
<p> Email:{{ $contact_from['email'] }}</p>
<p> Phone:{{ $contact_from['phone'] }}</p>
<p> Message:{{ $contact_from['message'] }}</p>
<?php $code=rand(000000,999999); ?>
<p> Verfication Code: {{ $code }} </p>

@endcomponent

