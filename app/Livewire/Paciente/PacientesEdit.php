<?php

namespace App\Livewire\Paciente;

use App\Models\Paciente;
use Livewire\Component;

class PacientesEdit extends Component
{
    public $nome;
    public $cpf;
    public $data_nascimento;
    public $telefone;
    public $leito_atual;
    public $pacienteId;

    public function mount($id)
    {
        $paciente = Paciente::find($id);

        $this->pacienteId = $paciente->id;
        $this->nome = $paciente->nome;
        $this->cpf = $paciente->cpf;
        $this->data_nascimento = $paciente->data_nascimento;
        $this->telefone = $paciente->telefone;
        $this->leito_atual = $paciente->leito_atual;
    }

    public function update()
    {
        $paciente = Paciente::find($this->pacienteId);

        $this->nome = $paciente->nome;
        $this->cpf = $paciente->cpf;
        $this->data_nascimento = $paciente->data_nascimento;
        $this->telefone = $paciente->telefone;
        $this->leito_atual = $paciente->leito_atual;

        $paciente->save();

        session()->flash('success', 'Atualizado');
        return redirect()->route('paciente.index');
    }

    public function render()
    {
        return view('livewire.paciente.pacientes-edit');
    }
}
