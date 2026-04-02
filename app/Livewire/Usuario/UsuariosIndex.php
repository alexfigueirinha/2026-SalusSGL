<?php

namespace App\Livewire\Usuario;

use App\Models\Usuario;
use Livewire\Component;

class UsuariosIndex extends Component
{
    public function render()

    {

         $usuarios = Usuario::all();

        return view('livewire.usuario.usuarios-index', compact('usuarios'));
    }
}
