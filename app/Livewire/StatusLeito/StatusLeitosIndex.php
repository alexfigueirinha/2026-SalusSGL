<?php

namespace App\Livewire\StatusLeito;

use App\Models\Leito;
use App\Models\StatusLeito;
use Livewire\Component;

class StatusLeitosIndex extends Component
{
    public function render()
    {

        $statusLeitos = StatusLeito::all();

        return view('livewire.status-leito.status-leitos-index', compact('statusLeitos'));
    }
}