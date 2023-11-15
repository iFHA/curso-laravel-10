@extends("admin.layouts.app", ['title'=>'Listagem dos Suportes'])
@section("header")
<h1>Listagem dos Suportes</h1>
@endsection
@section("content")
<a href="{{ route('supports.create') }}">Criar Dúvida</a>
<table>
    <thead>
        <tr>
            <th>Assunto</th>
            <th>Descrição</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supports->items() as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->body }}</td>
                <td>{{ $support->status }}</td>
                <td>
                    <a href="{{ route('supports.show', $support->id) }}">
                        >
                    </a>
                    <a href="{{ route('supports.edit', $support->id) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-pagination :paginator="$supports" :appends="$filters"/>

@endsection
