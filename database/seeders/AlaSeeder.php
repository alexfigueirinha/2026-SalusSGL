<?php

namespace Database\Seeders;

use App\Models\Ala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ala::create([
            'nome' => 'Maternidade 2',
            'total_quartos' => 5,
            'quartos_cadastrados' => 1,
            'data_criacao' => now(),
            'descricao' => 'teste'
        ]);
    }
}
