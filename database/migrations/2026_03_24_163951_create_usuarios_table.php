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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('email')->unique;
            $table->enum('tipo', ['recepcionista', 'enfermeiro', 'auxiliar_enfermagem', 'higienizacao', 'gestor', 'manutencao', 'medico'])->nullable(false);
            $table->enum('status', ['ativo', 'inativo'])->nullable(false);
            $table->string('senha')->nullable(false);
            $table->bigInteger('telefone');
            $table->datetime('data_cadastro')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
