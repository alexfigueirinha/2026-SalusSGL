<?php

namespace App\Livewire\Internacao;

use App\Models\Internacao;
use Livewire\Component;

class InternacaosEdit extends Component
{
    public $data_hora_entrada;
    public $data_hora_saida;
    public $pacientes_id;
    public $leitos_id;
    public $alas_id;
    public $quartos_id;
    public $internacaoId;

    public function mount($id)
    {
        $internacao = Internacao::find($id);

        $this->internacaoId = $internacao->id;
        $this->data_hora_entrada = $internacao->data_hora_entrada;
        $this->data_hora_saida = $internacao->data_hora_saida;
        $this->pacientes_id = $internacao->pacientes_id;
        $this->leitos_id = $internacao->leitos_id;
        $this->alas_id = $internacao->alas_id;
        $this->quartos_id = $internacao->quartos_id;
    }

    public function update()
    {
        $internacao = Internacao::find($this->internacaoId);

        $this->data_hora_entrada = $internacao->data_hora_entrada;
        $this->data_hora_saida = $internacao->data_hora_saida;
        $this->pacientes_id = $internacao->pacientes_id;
        $this->leitos_id = $internacao->leitos_id;
        $this->alas_id = $internacao->alas_id;
        $this->quartos_id = $internacao->quartos_id;

        $internacao->save();

        session()->flash('success', 'Atualizado');
        return redirect()->route('internacao.index');
    }

    public function render()
    {
        return view('livewire.internacao.internacaos-edit');
    }
}
