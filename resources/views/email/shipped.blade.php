
@component('mail::message')
# NewsLetter
This is my NewsLetter

Subscribe to our newLetter;

@component('mail::button', ['url' => ''])

@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent 