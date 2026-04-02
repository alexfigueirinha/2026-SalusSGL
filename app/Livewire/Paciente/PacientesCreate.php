<?php

namespace App\Livewire\Paciente;

use App\Models\Paciente;
use Livewire\Component;

class PacientesCreate extends Component
{
    public $nome;
    public $cpf;
    public $data_nascimento;
    public $telefone;
    public $leito_atual;

    public function store()
    {
        Paciente::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
            'telefone' => $this->telefone,
            'leito_atual' => $this->leito_atual
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('paciente.index');
    }

    public function render()
    {
        return view('livewire.paciente.pacientes-create');
    }
}
