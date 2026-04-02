<?php

namespace App\Livewire\Leito;

use App\Models\Leito;
use Livewire\Component;

class LeitosIndex extends Component
{
    public function render()
    {

        $leitos = Leito::all();

        return view('livewire.leito.leitos-index', compact('leitos'));
    }
}
