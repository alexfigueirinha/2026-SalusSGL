<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leitos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('quartos_id');
            $table->unsignedBigInteger('alas_id');
            $table->string('leito');
            $table->enum('atualizacao', ['disponivel', 'ocupado', 'em_limpeza', 'reservado', 'manutencao', 'emergencia'])->nullable(false)->default('disponivel');
            $table->date('data_criacao')->nullable(true);
            $table->foreign('quartos_id')->references('id')->on('quartos');
            $table->foreign('alas_id')->references('id')->on('alas');
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leitos');
    }
};
