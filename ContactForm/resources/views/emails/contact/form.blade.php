@component('mail::message')
# Nova Kontakt Poruka

Dobili ste novu poruku putem kontakt forme na vašem sajtu.

**Ime:** {{ $formData['name'] }}
**Prezime:** {{ $formData['surname'] }}
**Email:** {{ $formData['email'] }}

@if(isset($formData['subject']) && $formData['subject'])
**Naslov:** {{ $formData['subject'] }}
@endif

**Poruka:**
{{ $formData['message'] }}

Hvala,
{{ config('app.name') }}
@endcomponent