<?php

namespace Database\Seeders;

use App\Models\Internacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InternacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Internacao::create([
            'data_hora_entrada' => now(),
            'data_hora_saida' => now(),
            'pacientes_id' => 1,
            'leitos_id' => 1,
            'alas_id' => 1,
            'quartos_id' => 1
        ]);
    }
}
