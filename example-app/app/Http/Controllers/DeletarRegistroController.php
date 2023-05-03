<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class DeletarRegistroController extends Controller
{
    public function deletarRegistro(Request $request,$tabela){
        
        try {
            DB::table('principal.'.$tabela)->where('id','=',$request->id)->delete();
            $msg = "Registro excluido!";
        } catch (\Throwable $th) {
            if (strpos($th,"violates foreign key constraint")) {
                $msg = "Não é possivel apagar o registro pois ele está sendo usado em outro lugar";
            } else {
                $msg = "Erro ao excluir registro.";
            }
            // não está funcionando por isso deixei de lado
            //$alert = "<script>alert('$msg');</script>";
        } finally {
            return redirect()->action("App\Http\Controllers\ListaController@listaTabela",[$tabela]);
        }

        
    }
}
