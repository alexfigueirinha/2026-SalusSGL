<?php

namespace App\Livewire\Quarto;

use App\Models\Ala;
use App\Models\Quarto;
use Livewire\Component;

class QuartosEdit extends Component
{
    public $quarto;
    public $total_leitos;
    public $data_criacao;
    public $alas_id;
    public $leitos_cadastrados;
    public $quartoId;

    public function mount($id)
    {
        $quarto = Quarto::find($id);

        if ($quarto == null) {
            session()->flash('error', 'não encontrado');
            return redirect()->route('quarto.index');
        }

        $this->quartoId = $quarto->id;
        $this->quarto = $quarto->quarto;
        $this->total_leitos = $quarto->total_leitos;
        $this->data_criacao = $quarto->data_criacao;
        $this->leitos_cadastrados = $quarto->leitos_cadastrados;
        $this->alas_id = $quarto->alas_id;
    }

    public function update()
    {
        $quarto = Quarto::find($this->quartoId);

        if ($quarto == null) {
            session()->flash('error', 'não encontrado');
            return redirect()->route('quarto.index');
        }
        if ($quarto->alas_id != $this->alas_id) {
            $alaOld = Ala::find($quarto->alas_id);
            if ($alaOld != null) {
                $alaOld->quartos_cadastrados--;
                $alaOld->save();
            }
            $alaNew = Ala::find($this->alas_id);
            if ($alaNew != null) {
                $alaNew->quartos_cadastrados++;
                $alaNew->save();
            }

        }
        $quarto->quarto = $this->quarto;
        $quarto->total_leitos = $this->total_leitos;
        $quarto->data_criacao = $this->data_criacao;
        $quarto->leitos_cadastrados = $this->leitos_cadastrados;
        $quarto->alas_id = $this->alas_id;

        $quarto->save();

        session()->flash('success', 'Atualizado');
        return redirect()->route('quarto.index');
    }

    public function render()
    {
        $alas = Ala::all();
        return view('livewire.quarto.quartos-edit',compact('alas'));
    }
}
