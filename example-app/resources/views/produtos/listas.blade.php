@extends('layoutPadrao')

@section('titulo')
    Lista de produtos
@stop

@section('corpo')
    <div class="div-table">
        <div class="card text-center">
            <div class="card-header table-title-padrao">
               
                {{$titulo_tabela}}
                
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            {{-- colunas dos icones para editar e excluir --}}
                            <th>
                                Opções
                            </th>

                            @foreach($colunas as $campo)
                                {{-- condição para remover o _id das FKs dos campos --}}
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
                            {{-- icones para ediar e excluir --}}
                            <td>
                                {{-- editar --}}
                                <a href="{{ url('/lista/'.$tabela.'/editar?id_registro='.$item->id.'&tabela='.$tabela)}}" class="a-icone-editar">
                                    <svg class="icone-editar" xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </a>

                                {{-- excluir --}}

                                <!-- Button modal para confirmar exclusão -->
                                <button type="button" class="btn btn-icon-delete" data-bs-toggle="modal" data-valores="{{ json_encode($item) }}" data-bs-target="#ModalConfirmaExclusao">
                                    <svg class="icone-excluir" xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="ModalConfirmaExclusao" tabindex="-1" aria-labelledby="ModalConfirmaExclusaoLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalConfirmaExclusaoLabel">Confirmação de exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="FormConfirmacao" action=" {{ url('/lista/'.$tabela.'/deletar/') }} " method="POST">
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="conteudo-form">
                                                        {{-- aqui vem os inputs do forms que é gerado no js --}}
                                                    </div>
                                                    
                                                    {{-- msg de de alerta avisando que a exclusão não tem como retornar os registros --}}
                                                    <div class="mb-2">
                                                        <div class="form-text text-alert-delete-registro">*A confirmarção de excluão ira apagar o registro permanentemente</div>
                                                    </div> 

                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Excluir</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>

                            @foreach($item as $col)
                                <td>{{$col}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <div class="row">
                        <div class="col-1">
                            <a href=" {{ url('/lista/'.$tabela.'/adicionar') }} " class="link-add-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="col-11"></div>
                    </div>
                    <hr>
                </div>
                <div class="centraliza-pagination">
                    {{$produtos->onEachSide(2)->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
    {{-- @dd($produtos); --}}
@stop

@if(session('alert'))
    {!! session('alert') !!}
@endif