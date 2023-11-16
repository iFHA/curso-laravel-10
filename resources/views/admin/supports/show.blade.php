@extends('admin.layouts.app', ['title' => "Detalhes da dúvida $support->id"])
@section("header")
<h1 class="text-lg text-black-500">Detalhes da Dúvida {{ $support->id }}</h1>
@endsection
@section("content")
<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Descrição: {{ $support->body }}</li>
    <li>Status: {{ $support->statusDescription }}</li>
</ul>
<form action="{{ route('supports.destroy', $support->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Excluir</button>
    <a class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="{{ url()->previous() }}">Voltar</a>
</form>

@endsection
