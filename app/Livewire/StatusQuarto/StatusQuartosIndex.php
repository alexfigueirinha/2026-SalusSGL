<?php

namespace App\Livewire\StatusQuarto;

use App\Models\StatusQuarto;
use Livewire\Component;

class StatusQuartosIndex extends Component
{
    public function render()
    {
        $statusQuartos = StatusQuarto::all();
        return view('livewire.status-quarto.status-quartos-index', compact('statusQuartos'));
    }
}
