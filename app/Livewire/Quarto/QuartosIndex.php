<?php

namespace App\Livewire\Quarto;

use App\Models\Quarto;
use Livewire\Component;

class QuartosIndex extends Component
{
    public function render()
    {
        $quartos = Quarto::all();
        return view('livewire.quarto.quartos-index', compact('quartos'));
    }
}
