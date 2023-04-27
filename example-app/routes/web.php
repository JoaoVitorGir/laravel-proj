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


Route::get('/teste', function () {
    $dados = [
        'titulo' => 'Minha Página',
        'mensagem' => 'Bem-vindo à minha página!'
    ];
    
    //return view('welcome');
    return view('home',$dados);
});

Route::get('ola', function () {
    return view('ola');
});

Route::get('/produtos',
    'App\Http\Controllers\ProdutosController@listaProdutos');