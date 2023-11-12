<h1>Listagem dos Suportes</h1>
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
        @foreach ($supports as $support)
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
