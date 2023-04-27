<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{     
    public function listaProdutos(){
        if (view()->exists('produtos.listaProdutos')){
            $list_produtos = DB::select('select * from produtos');
            return view('produtos.listaProdutos',['produtos' => $list_produtos]);
        }else{
            return "pagina não encontrada";
        }
    }
}
