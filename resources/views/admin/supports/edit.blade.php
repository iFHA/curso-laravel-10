<h1>Editando Dúvida {{ $support->id }}</h1>
<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="subject" placeholder="Assunto" value="{{ old('subject') ?? $support->subject }}">
    <textarea name="body"  cols="30" rows="5" placeholder="Descrição">{{ old('body') ?? $support->body }}</textarea>
    <button type="submit">Salvar Dúvida</button>
</form>
<a href="{{ url()->previous() }}">Voltar</a>
