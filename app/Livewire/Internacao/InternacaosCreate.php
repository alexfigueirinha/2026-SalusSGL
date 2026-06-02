<?php

namespace App\Livewire\Internacao;

use App\Models\Ala;
use App\Models\Internacao;
use App\Models\Leito;
use App\Models\Paciente;
use App\Models\Quarto;
use Livewire\Component;

class InternacaosCreate extends Component
{
    public $data_hora_entrada;
    public $data_hora_saida;
    public $pacientes_id;
    public $leitos_id;
    public $alas_id;
    public $quartos_id;

    public function store()
    {
        Internacao::create([
            'data_hora_entrada' => $this->data_hora_entrada,
            'data_hora_saida' => $this->data_hora_saida,
            'pacientes_id' => $this->pacientes_id,
            'leitos_id' => $this->leitos_id,
            'alas_id' => $this->alas_id
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('internacao.index');
    }

    public function render()
    {
        $alas = Ala::all();
        $quartos = Quarto::all();
        $leitos = Leito::all();
        $pacientes = Paciente::all();
        return view('livewire.internacao.internacaos-create', compact('alas', 'quartos', 'leitos', 'pacientes'));
    }
}
