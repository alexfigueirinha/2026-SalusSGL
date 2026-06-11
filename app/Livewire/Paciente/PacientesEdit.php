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
    public $data_entrada;
    public $pacienteId;


    public function mount($id)
    {
        $paciente = Paciente::find($id);

        if ($paciente == null) {
            session()->flash('error', 'não encontrado');
            return redirect()->route('paciente.index');


        $this->pacienteId = $paciente->id;
        $this->nome = $paciente->nome;
        $this->cpf = $paciente->cpf;
        $this->data_nascimento = $paciente->data_nascimento;
        $this->telefone = $paciente->telefone;
        $this->data_entrada = $paciente->data_entrada;
    }

    }

    public function update()
    {
        $paciente = Paciente::find($this->pacienteId);

        if ($paciente == null) {
            session()->flash('error', 'não encontrado');
            return redirect()->route('paciente.index');


        $this->nome = $paciente->nome;
        $this->cpf = $paciente->cpf;
        $this->data_nascimento = $paciente->data_nascimento;
        $this->telefone = $paciente->telefone;
        $this->data_entrada = $paciente->data_entrada;

        $paciente->save();

        session()->flash('success', 'Atualizado');
        return redirect()->route('paciente.index');
    }

}

    public function render()
    {
        return view('livewire.paciente.pacientes-edit');
    }
}
