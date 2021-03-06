@extends('ramodnil.page')

@section('header-title')
    <h1>
        Usuários
        <small>Criar</small>
    </h1>
@stop

@section('header-breadcrumbs')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
    <li class="breadcrumb-item active">Criar</li>
@endsection

@section('content')
    @include('admin.users.form')
@stop