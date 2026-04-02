<?php

namespace App\Livewire\MovimentacaoLeito;

use App\Models\MovimentacaoLeito;
use Livewire\Component;

class MovimentacaoLeitosIndex extends Component
{
    public function render()
    {

        $movimentacaoLeitos = MovimentacaoLeito::all();

        return view('livewire.movimentacao-leito.movimentacao-leitos-index', compact('movimentacaoLietos'));
    }
}
