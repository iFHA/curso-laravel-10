<h1>Detalhes da Dúvida {{ $support->id }}</h1>
<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Descrição: {{ $support->body }}</li>
    <li>Status: {{ $support->status }}</li>
</ul>
<form action="{{ route('supports.destroy', $support->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>
<a href="{{ url()->previous() }}">Voltar</a>
