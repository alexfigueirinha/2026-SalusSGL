<?php

namespace App\Livewire\MovimentacaoLeito;

use App\Models\MovimentacaoLeito;
use Livewire\Component;

class MovimentacaoLeitosCreate extends Component
{

    public $quartos_id;

     public function store(){
            MovimentacaoLeito::create([
            'quartos_id' => $this->quartos_id,
            'leitos_id' => $this->leitos_id,
            'usuarios_id' => $this->usuarios_id
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('movimentacao.leito.index');
    }
    public function render()
    {
        return view('livewire.movimentacao-leito.movimentacao-leitos-create');
    }
}
