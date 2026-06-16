<?php

namespace Database\Seeders;

use App\Models\Leito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leito::create([
            'leito' => '1',
            'atualizacao' => 'disponivel',
            'data_criacao' => now(),
            'quartos_id' => 1,
            'alas_id' => 1
        ]);
    }
}
