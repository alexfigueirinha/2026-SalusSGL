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
        Schema::create('movimentacao_leitos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('internacao_id');
            $table->foreign('internacao_id')->references('id')->on('internacaos');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->string('movimentacao');
            $table->string('motivo')->nullable();
            $table->string('solicitado_por')->nullable();
            $table->string('aprovado_por')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacao_leitos');
    }
};
