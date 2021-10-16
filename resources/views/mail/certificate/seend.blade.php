@component('mail::message')
# Envío de certificado

Hola, aqui puedes descargar tu certificado en línea.

@component('mail::button', ['url' => route('certificates.show',$certificate->id)])
Ver certificado
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
