<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    
    public function up(): void
    {
        //DB::statement('CREATE SCHEMA principal');

        Schema::create('principal.categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            //$table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('principal.categorias');
    }
};
