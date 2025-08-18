

<x-mail::message>
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

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
