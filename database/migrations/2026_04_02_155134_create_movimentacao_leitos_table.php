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
            $table->unsignedBigInteger('quartos_id');
            $table->unsignedBigInteger('leitos_id');
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('quartos_id')->references('id')->on('quartos');
            $table->foreign('leitos_id')->references('id')->on('leitos');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
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
