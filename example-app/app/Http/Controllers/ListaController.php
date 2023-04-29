<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class ListaController extends Controller
{     
    public function listaTabela($tabela){
        if (view()->exists('produtos.listas')){
            $list = DB::table('principal.'.$tabela)->get();
            return view('produtos.listas',
                ['produtos' => $list,
                 'colunas'  => Schema::getColumnListing('principal.'.$tabela),
                 'titulo_tabela' => $tabela]);
        }else{
            return "pagina não encontrada";
        }
    }

}