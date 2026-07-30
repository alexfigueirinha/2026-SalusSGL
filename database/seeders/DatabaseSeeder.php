<?php

namespace Database\Seeders;

use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PacienteSeeder::class,
            AlaSeeder::class,
            QuartoSeeder::class,
            LeitoSeeder::class,
            InternacaoSeeder::class
        ]);

        Usuario::create([
            'nome' => 'Gestor',
            'email' => 'gestor@salussgl.com',
            'senha' => Hash::make('123'),
            'telefone' => '18999999999',
            'tipo' => 'gestor',
            'status' => 'ativo'
        ]);
    }
}
