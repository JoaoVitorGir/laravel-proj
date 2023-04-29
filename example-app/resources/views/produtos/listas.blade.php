@extends('layoutPadraoTabelas')

@section('titulo')
    Lista de produtos
@stop

@section('titulo-tabela')
    {{$titulo_tabela}}
@stop

@section('corpo-tabela')
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach($colunas as $campo)
                    @if (strpos($campo,'_'))
                        <th scope="col">{{str_replace('_id', '',$campo)}}</th>
                    @else
                        <th scope="col">{{$campo}}</th>     
                    @endif

                @endforeach
            </tr>
        </thead>
        <tbody>

        @foreach ($produtos as $item)
    
            <tr>
                @foreach($item as $col)
                <td>{{$col}}</td>
                @endforeach
            </tr>
            
        @endforeach

        </tbody>
    </table>
@stop