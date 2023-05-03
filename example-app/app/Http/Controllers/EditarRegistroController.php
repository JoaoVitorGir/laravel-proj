<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EditarRegistroController extends Controller
{
    public function editar(Request $request){
        //return $request;
        if (view()->exists('produtos.editar')){
            
            $list = DB::table('principal.'.$request->tabela)->where('id','=',$request->id_registro)->get();
            //return $list;
            return view('produtos.editar',
                ['registro'    => $list,
                 'tabela'      => $request->tabela]);

        }else{
            return "pagina não encontrada";
        }
    }

    public function salvarEdicao(Request $request, $tabela){

        // keys são os campos da minha tabela mais o _token que vem junto no reques
        $keys = $request->keys();

        // filtra para deixar apenas os campos que podem sofrer atualizações
        $keysFiltrada = array_filter($request->all(), function($key) {
            return strpos($key, 'id') === false && $key != "_token";
        }, ARRAY_FILTER_USE_KEY);

        // return $keysFiltrada;

        DB::table('principal.'.$tabela)->where('id','=',$request->id)->update($keysFiltrada);

        return redirect()->action("App\Http\Controllers\ListaController@listaTabela",[$tabela]);
       }

}
