<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdicionarRegistroController extends Controller
{
    public function formAdicionar($tabela){
        //return "teste";
        if (view()->exists('produtos.adicionar')){

            return view('produtos.adicionar',
            ['tabela'        => $tabela,
             'campos'       => Schema::getColumnListing('principal.'.$tabela),
             'titulo_tabela' => $tabela]);
        }else{
            return "pagina não encontrada";
        }
    }

    public function adicionar(Request $request, $tabela){
        return $request;
    }
}
