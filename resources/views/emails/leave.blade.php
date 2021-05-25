@component('mail::message')
<img  src="{{ asset('storage/uploads/images/nandi-logo.jpg') }}"  width="600" height="160"/>
# Leave Application

{{ $data }}

Thanks, <br>
{{ config('app.name') }}
@endcomponent
