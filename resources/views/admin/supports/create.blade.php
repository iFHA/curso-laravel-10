<h1>Nova Dúvida</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.store') }}" method="POST">
    @csrf
    <input autofocus type="text" name="subject" placeholder="Assunto" value="{{ old('subject') ?? '' }}">
    <textarea name="body"  cols="30" rows="5" placeholder="Descrição">{{ old('body') ?? '' }}</textarea>
    <button type="submit">Incluir Dúvida</button>
</form>
<a href="{{ url()->previous() }}">Voltar</a>
