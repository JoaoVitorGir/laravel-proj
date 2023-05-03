<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesquisaController extends Controller
{
    public function pesquisaCampoFK(Request $request){
        // pesquisa a tabela da onde vem a FK e campo dela
        $result_pesquisa = DB::table('information_schema.table_constraints')
                        ->select(['constraint_column_usage.table_name as tabela_PK', 'constraint_column_usage.column_name AS coluna_PK'])
                        ->join('information_schema.key_column_usage', function ($join) {
                            $join->on('table_constraints.constraint_name','=','key_column_usage.constraint_name')
                                    ->on('table_constraints.table_schema', '=', 'key_column_usage.table_schema');
                        })
                        ->join('information_schema.constraint_column_usage', function ($join) {
                            $join->on('constraint_column_usage.constraint_name','=','table_constraints.constraint_name')
                                    ->on('constraint_column_usage.table_schema', '=', 'table_constraints.table_schema');
                        })
                        ->where('constraint_type', '=', 'FOREIGN KEY')
                        // tabela aode a FK está
                        ->where('table_constraints.table_name','=', $request->tabelaFK)
                        // campo FK
                        ->where('key_column_usage.column_name', '=', $request->campoFK)
                        ->get();
        
        // select com os regitros desta tabela
        $result_valores = DB::table('principal.'.$result_pesquisa[0]->tabela_PK)->orderBy('id')->get();

        return $result_valores;
    }
}
