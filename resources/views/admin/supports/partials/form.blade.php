@csrf
<input
    type="text"
    name="subject"
    placeholder="Assunto"
    value="{{ old('subject') ?? $support?->subject ?? '' }}"
    autofocus
>
<textarea
    name="body"
    cols="30"
    rows="5"
    placeholder="Descrição"
>{{ old('body') ?? $support?->body ?? '' }}</textarea>
<button type="submit">{{ isset($support) ? 'Salvar' : 'Incluir' }} Dúvida</button>
