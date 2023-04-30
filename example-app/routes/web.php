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

// rotas POST

Route::post('/lista/{tabela}/editar',
    'App\Http\Controllers\EditarRegistroController@salvarEdicao');