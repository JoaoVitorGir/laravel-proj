<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('principal.avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('usuario_id');
            $table->integer('nota');
            $table->text('comentario')->nullable();
            //$table->timestamps();

            $table->foreign('produto_id')->references('id')->on('principal.produtos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('principal.avaliacoes');
    }
};
