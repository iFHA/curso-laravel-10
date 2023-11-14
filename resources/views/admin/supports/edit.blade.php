<h1>Editando Dúvida {{ $support->id }}</h1>

<x-alert/>

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', compact('support'))
</form>
<a href="{{ route('supports.index') }}">Voltar</a>
