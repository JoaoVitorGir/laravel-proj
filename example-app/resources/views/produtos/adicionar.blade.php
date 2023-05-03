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
                <form action="{{ url('/lista/'.$tabela.'/adicionar') }}" method="POST">
                    <div class="text-form">*campo usuario ainda não exite a tabela</div>
                    @csrf
                    {{-- percorre todos os campos e diciona eles em um input --}}
                    @foreach($campos as $value)
                        {{-- não adiciona o input id pq o id gera automatico --}}
                        @if ("id" != $value)
                            <div class="mb-2">
                                <label  class="form-label">{{str_replace("_id", "", $value)}}</label>
                                {{-- icone lupa ao lado para pesquisar os posíveis valores --}}
                                @if (strpos($value,'_id'))
                                    <button class="btn btn-lupa-pesquisar" type="button" data-campo="{{$value}}" data-tabela="{{$tabela}}" data-bs-target="#ModalPesquisaValores" data-bs-toggle="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalPesquisaValores" tabindex="-1" aria-labelledby="ModalPesquisaValoresLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalPesquisaValoresLabel">Pesquisa valores</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <table class="table table-hover">
                                                        <thead id="nome-colunas">
                                                            {{-- conteudo gerado pelo js --}}
                                                        </thead>
                                                        <tbody id="conteudo-campo">
                                                            {{-- conteudo gerado pelo js --}}
                                                        </tbody>
                                                    </table>
                                                    
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Confirmar</button>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                                
                                <input type="text" class="form-control" name="{{$value}}">
                            </div>
                        @endif 
                    @endforeach
                    
                    <button type="submit" class="btn btn-success mt-4">Adicionar</button>
                </form>
                {{-- @dd($registro) --}}
            </div>
        </div>        
    </div>
@stop