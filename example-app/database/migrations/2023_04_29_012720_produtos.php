<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('principal.produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->decimal('preco', 10, 2)->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('fabricante_id');
            //$table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('principal.categorias');
            $table->foreign('fabricante_id')->references('id')->on('principal.fabricantes');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('principal.produtos');
    }
};
