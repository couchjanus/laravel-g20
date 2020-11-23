@component('mail::message')
# {{ $maildata['title'] }}

The body of your message.

@component('mail::button', ['url' => $maildata['url']])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

