<?php

namespace App\Livewire\StatusQuarto;

use App\Models\StatusQuarto;
use Livewire\Component;

class StatusQuartosEdit extends Component
{
    public $status;
    public $quartos_id;
    public $statusQuartoId;

    public function mount($id)
    {
        $statusQuarto = StatusQuarto::find($id);

        $this->statusQuartoId = $statusQuarto->id;
        $this->status = $statusQuarto->status;
        $this->quartos_id = $statusQuarto->quartos_id;
    }

    public function update()
    {
        $statusQuarto = StatusQuarto::find($this->statusQuartoId);

        $this->status = $statusQuarto->status;
        $this->quartos_id = $statusQuarto->quartos_id;

        $statusQuarto->save();

        session()->flash('success', 'Atualizado');
        return redirect()->route('status.quarto.index');
    }

    public function render()
    {
        return view('livewire.status-quarto.status-quartos-edit');
    }
}
