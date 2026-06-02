<?php

namespace Database\Seeders;

use App\Models\Quarto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuartoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quarto::create([
            'quarto' => '1',
            'total_leitos' => '5',
            'data_criacao' => now(),
            'alas_id' => '1'
        ]);
    }
}
