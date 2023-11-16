@extends('admin.layouts.app', ['title'=>"Editando Dúvida"])
@section('header')
<h1 class="text-lg text-black-500">Editando Dúvida {{ $support->subject }}</h1>
@endsection

@section('content')
<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', compact('support'))
</form>

@endsection
