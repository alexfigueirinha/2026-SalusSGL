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
        Schema::create('alas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome')->unique;
            $table->integer('total_quartos');
            $table->integer('quartos_cadastrados')->nullable(true);
            $table->datetime('data_criacao')->nullable(true);
            $table->string('descricao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alas');
    }
};
