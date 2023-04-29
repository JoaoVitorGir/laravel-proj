@extends('layoutHome')

@section('titulo')
    Home
@stop

@section('lista-tabelas')

    <div class="list-group">
        @foreach( $tabelas as $table)
            {{-- table_name é o nome da coluna que foi pesquisada no SQL da HomeController --}}
            <a href="{{ url('/lista/'.$table->table_name)}}" class="list-group-item list-group-item-action">{{$table->table_name}}</a>
        @endforeach
        {{-- @dump($tabelas); --}}
    </div>

@stop

@section('corpo')
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
    <p>bem vindo a Home page...</p>
@stop