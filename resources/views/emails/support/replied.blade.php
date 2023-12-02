<x-mail::message>
# Dúvida Respondida

Assunto da dúvida: {{ $support->subject }}

<x-mail::button :url="route('replies.index', $support->id)">
Ver a dúvida
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
