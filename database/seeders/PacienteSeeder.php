<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paciente::create([
            'nome' => 'Paciente 1',
            'cpf' => '22233344433',
            'data_nascimento' => '2008-12-14',
            'telefone' => '18999993333',
        ]);
    }
}
