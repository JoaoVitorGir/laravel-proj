@extends('layoutPadrao')

@section('titulo')
    Lista de produtos
@stop

@section('corpo')
    <h1>Lista de produtos</h1>
    @foreach ($produtos as $item)
        <P>{{$item->id}} - {{$item->nome}} - {{$item->descricao}}</P>
    @endforeach
@stop