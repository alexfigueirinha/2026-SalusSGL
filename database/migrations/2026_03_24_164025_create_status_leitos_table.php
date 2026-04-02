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
        Schema::create('status_leitos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('leitos_id');
            $table->enum('status', ['disponivel', 'ocupado', 'em_limpeza', 'emergencia', 'reserva', 'manutencao'])->nullable(false)->default('disponivel');
            $table->foreign('leitos_id')->references('id')->on('leitos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_leitos');
    }
};
