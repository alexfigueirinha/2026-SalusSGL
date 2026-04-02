<?php

namespace App\Livewire\Ala;

use App\Models\Ala;
use Livewire\Component;

class AlasIndex extends Component
{

    public function render()
    {

        $alas = Ala::all();

        return view('livewire.ala.alas-index', compact('alas'));
    }
}
