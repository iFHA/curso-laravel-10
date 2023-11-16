@extends('admin.layouts.app', ['title'=>'Cadastrando nova dúvida'])
@section('header')
<h1 class="text-lg text-black-500">Cadastrando Nova Dúvida</h1>
@endsection

@section('content')

<form action="{{ route('supports.store') }}" method="POST">
    @include("admin.supports.partials.form")
</form>

@endsection
