<?php

namespace App\Livewire\Usuario;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsuariosIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        if ($id == Auth::id()) {
            session()->flash('error', 'Você não pode excluir a sua própria conta!');
            return;
        }
        $usuario = Usuario::find($id);

        if ($usuario != null) {
            $usuario->delete();
            session()->flash('success', 'Usuário excluído com sucesso.');
        }
    }

    public function render()

    {

        $usuarios = Usuario::where('nome', 'like', '%' . $this->search . '%')->get();
        return view('livewire.usuario.usuarios-index', compact('usuarios'));
    }
}
