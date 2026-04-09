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
        Schema::create('quartos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('quarto');
            $table->unsignedBigInteger('alas_id');
            $table->integer('total_leitos');
            $table->foreign('alas_id')->references('id')->on('alas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quartos');
    }
};
