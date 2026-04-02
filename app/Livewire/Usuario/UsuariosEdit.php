<?php

namespace App\Livewire\Usuario;

use App\Models\Usuario;
use Livewire\Component;

class UsuariosEdit extends Component
{

    public $nome;
    public $email;
    public $tipo;
    public $telefone;
    public $status_usuario;
    public $data_cadastro;

    public function mount($id){
        $usuario = Usuario::find($id);

        $this->nome = $usuario->nome;
        $this->email = $usuario->email;
        $this->tipo = $usuario->tipo;
        $this->telefone = $usuario->telefone;
        $this->status_usuario = $usuario->status_usuario;
        $this->data_cadastro = $usuario->data_cadastro;

    }

    public function update(){
        $usuario = Usuario::find($this->usuarioId);

        $usuario->nome = $this->nome;
        $usuario->email = $this->email;
        $usuario->tipo = $this->tipo;
        $usuario->telefone = $this->telefone;
        $usuario->status_usuario = $this->status_usuario;
        $usuario->data_cadastro = $this->data_cadastro;

        $usuario->save();

     session()->flash('success','Atualizado');
        return redirect()->route('usuario.index');
    }

    public function render()
    {
        return view('livewire.usuario.usuarios-edit');
    }
}
