@component('mail::message')
# Hey {{ $data->email }},

Please verify your email to recieve new updates.

@component('mail::button', ['url' => route('verify.email' , ['id' => $data->id])])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
