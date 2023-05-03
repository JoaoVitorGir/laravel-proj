@extends('layoutPadrao')

@section('titulo')
    Edição das {{$tabela}}
@stop

@section('corpo')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header table-title-padrao text-center">
                {{$tabela}}
            </div>
            <div class="card-body">
                <form action="{{ url('/lista/'.$tabela.'/editar') }}" method="POST">
                    @csrf
                    {{-- percorre todos os campos e diciona eles em um input --}}
                    @foreach($registro[0] as $key => $value)
                        {{-- se for um id não deixa alterar o valor --}}
                        @if ($key === "id" || strpos($key,'_id'))
                            {{-- se for uma FK também não deixa alterar o valor e remove o _id do nome na exibição --}}
                            @if (strpos($key,'_id'))
                                <div class="mb-2">
                                    <label for="exampleInputPassword1" class="form-label">{{str_replace("_id", "", $key)}}</label>
                                    <input type="text" class="form-control form-campo-id" name="{{$key}}" id="exampleInputPassword1" value="{{$value}}" readonly>
                                    <div id="emailHelp" class="form-text">Campos id não podem ser editados</div>
                                </div>
                            @else
                                <div class="mb-2">
                                    <label for="exampleInputPassword1" class="form-label">{{$key}}</label>
                                    <input type="text" class="form-control form-campo-id" name="{{$key}}" id="exampleInputPassword1" value="{{$value}}" readonly>
                                    <div id="emailHelp" class="form-text">Campos id não podem ser editados</div>
                                </div>  
                            @endif
                        @else
                            <div class="mb-2">
                                <label for="exampleInputPassword1" class="form-label">{{$key}}</label>
                                <input type="text" class="form-control" name="{{$key}}" id="exampleInputPassword1" value="{{$value}}">
                            </div>    
                        @endif
                    @endforeach
                    
                    <button type="submit" class="btn btn-primary mt-4">Salvar</button>
                </form>
                {{-- @dd($registro) --}}
            </div>
        </div>        
    </div>
@stop