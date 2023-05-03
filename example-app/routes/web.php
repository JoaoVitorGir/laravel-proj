<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// rotas GET

Route::get('/lista/{tabela}',
    'App\Http\Controllers\ListaController@listaTabela');

Route::get('/lista/{tabela}/editar',
    'App\Http\Controllers\EditarRegistroController@editar');

Route::get('/home',
    'App\Http\Controllers\HomeController@Home');

Route::get('/lista/{tabela}/adicionar',
    'App\Http\Controllers\AdicionarRegistroController@formAdicionar');

Route::get('/pesquisa/campos',
    'App\Http\Controllers\PesquisaController@pesquisaCampoFK');

// rotas POST

Route::post('/lista/{tabela}/editar',
    'App\Http\Controllers\EditarRegistroController@salvarEdicao');

Route::post('/lista/{tabela}/adicionar',
    'App\Http\Controllers\AdicionarRegistroController@Adicionar');

// rotas DELETE

Route::delete('/lista/{tabela}/deletar/',
    'App\Http\Controllers\DeletarRegistroController@deletarRegistro');