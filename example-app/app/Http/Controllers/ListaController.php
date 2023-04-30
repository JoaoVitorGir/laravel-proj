<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ListaController extends Controller
{     
    public function listaTabela($tabela){
        if (view()->exists('produtos.listas')){

            $list = DB::table('principal.'.$tabela)
                        ->orderBy('id')
                        ->paginate(10);

            return view('produtos.listas',
                ['produtos'      => $list,
                 'tabela'        => $tabela,
                 'colunas'       => Schema::getColumnListing('principal.'.$tabela),
                 'titulo_tabela' => $tabela]);
        }else{
            return "pagina não encontrada";
        }
    }

}