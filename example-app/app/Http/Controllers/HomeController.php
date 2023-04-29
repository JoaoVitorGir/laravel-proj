<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Home(){
        if( view()->exists('home')){
            $tabelas = DB::table('information_schema.tables')
                           ->select(['table_name'])
                           ->where('table_schema','=','principal')
                           ->orderBy('table_name')
                           ->get();
            return view('home',['tabelas' => $tabelas]);
        }else{
            return "Pagina não encontrada";
        }
    }
}
