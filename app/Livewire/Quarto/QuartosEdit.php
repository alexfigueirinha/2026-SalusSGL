<?php

namespace App\Livewire\Quarto;

use App\Models\Quarto;
use Livewire\Component;

class QuartosEdit extends Component
{
    public $quarto;
    public $total_leitos;
    public $alas_id;
    public $quartoId;

    public function mount($id)
    {
        $quarto = Quarto::find($id);

        $this->quartoId = $quarto->id;
        $this->quarto = $quarto->quarto;
        $this->total_leitos = $quarto->total_leitos;
        $this->alas_id = $quarto->id;
    }

    public function update()
    {
        $quarto = Quarto::find($this->quartoId);

        $this->quarto = $quarto->quarto;
        $this->total_leitos = $quarto->total_leitos;
        $this->alas_id = $quarto->alas_id;

        $quarto->save();

        session()->flash('success', 'Atualizado');
        return redirect()->route('quarto.index');
    }

    public function render()
    {
        return view('livewire.quarto.quartos-edit');
    }
}
