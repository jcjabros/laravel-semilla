@component('mail::message')
# Thank You for Subscribing with us.

The body of your message.

@component('mail::button', ['url' => ''])
Go to page
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
