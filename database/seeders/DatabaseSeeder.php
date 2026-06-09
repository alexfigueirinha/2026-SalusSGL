<?php

namespace Database\Seeders;

use App\Livewire\Auth\Login;
use App\Models\User;
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

        User::create([
            'name' => 'Admin',
            'email' => 'admin@senai.com',
            'password' => Hash::make('123')
        ]);
        
    }
    
}
