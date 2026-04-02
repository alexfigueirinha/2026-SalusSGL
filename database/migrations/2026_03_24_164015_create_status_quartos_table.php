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
        Schema::create('status_quartos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('quartos_id');
            $table->enum('status', ['disponivel', 'ocupado', 'em_limpeza', 'bloqueado'])->nullable(false)->default('disponivel');
            $table->foreign('quartos_id')->references('id')->on('quartos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_quartos');
    }
};
