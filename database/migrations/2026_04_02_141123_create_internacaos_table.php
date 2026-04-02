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
        Schema::create('internacaos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_hora_entrada');
            $table->dateTime('data_hora_saida');
            $table->unsignedBigInteger('pacientes_id');
            $table->unsignedBigInteger('leitos_id');
            $table->unsignedBigInteger('alas_id');
            $table->unsignedBigInteger('quartos_id');
            $table->foreign('pacientes_id')->references('id')->on('pacientes');
            $table->foreign('leitos_id')->references('id')->on('leitos');
            $table->foreign('alas_id')->references('id')->on('alas');
            $table->foreign('quartos_id')->references('id')->on('quartos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internacaos');
    }
};
