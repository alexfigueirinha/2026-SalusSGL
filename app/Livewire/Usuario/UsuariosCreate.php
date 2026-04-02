<?php

namespace App\Livewire\Usuario;

use App\Models\Usuario;
use Livewire\Component;

class UsuariosCreate extends Component
{

    public $nome;
    public $email;
    public $tipo;
    public $telefone;
    public $status_usuario;
    public $data_cadastro;

    public function store(){
        Usuario::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'tipo' => $this->tipo,
            'telefone' => $this->telefone,
            'status_usuario' => $this->status_usuario,
            'data_cadastro' => $this->data_cadastro,
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('usuario.index');
    }

    public function render()
    {
        return view('livewire.usuario.usuarios-create');
    }
}
