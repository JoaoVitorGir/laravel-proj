<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EditarRegistroController extends Controller
{
    public function Editar(Request $request){
        if (view()->exists('produtos.editar')){
            
            $list = DB::table('principal.'.$request->tabela)->where('id','=',$request->id_registro)->get();

            return view('produtos.editar',
                ['registro'    => $list,
                 'tabela'      => $request->tabela]);

        }else{
            return "pagina não encontrada";
        }
    }
}
