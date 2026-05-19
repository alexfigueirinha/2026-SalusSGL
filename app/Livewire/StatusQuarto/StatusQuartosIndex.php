<?php

namespace App\Livewire\StatusQuarto;

use App\Models\StatusQuarto;
use Livewire\Component;

class StatusQuartosIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $statusQuarto = StatusQuarto::find($id);

        if ($statusQuarto != null) {
            $statusQuarto->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()
    {
        $statusQuartos = StatusQuarto::all();
        return view('livewire.status-quarto.status-quartos-index', compact('statusQuartos'));
    }
}
