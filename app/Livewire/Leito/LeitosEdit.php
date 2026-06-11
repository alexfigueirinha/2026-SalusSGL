<?php

namespace App\Livewire\Leito;

use App\Models\Ala;
use App\Models\Leito;
use App\Models\Quarto;
use Livewire\Component;

class LeitosEdit extends Component
{

    public $atualizacao;
    public $data_criacao;
    public $quartos_id;
    public $alas_id;
    public $leitoId;

    public function mount($id)
    {
        $leito = Leito::find($id);

        if ($leito == null) {
            session()->flash('error', 'não encontrado');
            return redirect()->route('leito.index');
        }

        $this->atualizacao = $leito->atualizacao;
        $this->quartos_id = $leito->quartos_id;
        $this->data_criacao = $leito->data_criacao;
        $this->alas_id = $leito->alas_id;
        $this->leitoId = $leito->id;
    }

    public function update()
    {
        $leito = Leito::find($this->leitoId);

        if ($leito == null) {
            session()->flash('error', 'não encontrado');
            return redirect()->route('leito.index');
        }

        if ($leito->quartos_id != $this->quartos_id) {
            $quartoOld = Quarto::find($leito->quartos_id);
            if ($quartoOld != null) {
                $quartoOld->leitos_cadastrados--;
                $quartoOld->save();
            }
            $quartoNew = Quarto::find($this->quartos_id);
            if ($quartoNew != null) {
                $quartoNew->leitos_cadastrados++;
                $quartoNew->save();
            }

        }

        $leito->atualizacao = $this->atualizacao;
        $leito->data_criacao = $this->data_criacao;
        $leito->quartos_id = $this->quartos_id;
        $leito->alas_id = $this->alas_id;

        $leito->save();

        session()->flash('success', 'Atualizado');
        return redirect()->route('leito.index');
    }

    public function render()
    {
        $quartos = Quarto::all();
        $alas = Ala::all();
        return view('livewire.leito.leitos-edit', compact('quartos', 'alas'));
    }
}
