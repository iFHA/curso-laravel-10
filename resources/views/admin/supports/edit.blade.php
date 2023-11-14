<h1>Editando Dúvida {{ $support->id }}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', compact('support'))
</form>
<a href="{{ route('supports.index') }}">Voltar</a>
