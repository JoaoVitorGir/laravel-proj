@extends('layoutPadrao')

@section('titulo')
    Home
@stop

@section('corpo')
    <div class="container container-principal">
        <div class="row">
            <div class="col-2 p-1">
                <div class="list-group">
                    @foreach( $tabelas as $table)
                        {{-- table_name é o nome da coluna que foi pesquisada no SQL da HomeController --}}
                        <a href="{{ url('/lista/'.$table->table_name.'?pag=1')}}" class="list-group-item list-group-item-action">{{$table->table_name}}</a>
                    @endforeach
                    {{-- @dump($tabelas); --}}
                </div>
            </div>
        
            <div class="col-10">

                {{-- so pra por algo na pagina --}}
                @for ($i = 0; $i < 15; $i++)
                    <p>bem vindo a Home page...</p>
                @endfor
                
            </div>
        </div>    
    </div>
@stop