<?php

namespace App\Livewire\Usuario;

use App\Models\Usuario;
use Livewire\Component;

class UsuariosIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario != null) {
            $usuario->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()

    {

         $usuarios = Usuario::where('nome', 'like', '%' . $this->search . '%')->get();
        return view('livewire.usuario.usuarios-index', compact('usuarios'));
    }
}
