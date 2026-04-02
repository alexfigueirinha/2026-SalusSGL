<?php

namespace App\Livewire\Internacao;

use App\Models\Internacao;
use Livewire\Component;

class InternacaosIndex extends Component
{
    public function render()
    {
        $internacaos = Internacao::all();
        return view('livewire.internacao.internacaos-index', compact('internacaos'));
    }
}
