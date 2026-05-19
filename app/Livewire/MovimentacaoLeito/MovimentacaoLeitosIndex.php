<?php

namespace App\Livewire\MovimentacaoLeito;

use App\Models\MovimentacaoLeito;
use Livewire\Component;

class MovimentacaoLeitosIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $movimentacaoLeito = MovimentacaoLeito::find($id);

        if ($movimentacaoLeito != null) {
            $movimentacaoLeito->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()
    {

        $movimentacaoLeitos = MovimentacaoLeito::all();

        return view('livewire.movimentacao-leito.movimentacao-leitos-index', compact('movimentacaoLietos'));
    }
}
