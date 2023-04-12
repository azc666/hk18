@component('mail::message')
# {{ $name }},
# Your message has been received!
We will be in contact ASAP!

{{ $name }} ({{ $email }}) submitted a message.<br>
Subject: {{ $type }}

@component('mail::panel')
{{ $name }} says:<br>
{{ $msg }}
@endcomponent

{{-- @component('mail::button', ['url' => route('contactus')]) --}}
@component('mail::button', ['url' => \URL::to('https://hkorderportal.com/contact')])
Leave Another Message
@endcomponent

Thanks,<br>
hkorderportal.com Support Team
@endcomponent
