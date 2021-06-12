@component('mail::message')
{{__('# Hey')}} {{ $data->email }},

{{__('Please verify your email to recieve new updates.')}}

@component('mail::button', ['url' => route('verify.email' , ['id' => $data->id])])
{{__('Verify')}}
@endcomponent

{{__('Thanks,')}}<br>
{{ config('app.name') }}
@endcomponent
