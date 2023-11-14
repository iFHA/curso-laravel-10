<h1>Nova Dúvida</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.store') }}" method="POST">
    @include("admin.supports.partials.form")
</form>
<a href="{{ route('supports.index') }}">Voltar</a>
