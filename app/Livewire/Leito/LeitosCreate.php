<?php

namespace App\Livewire\Leito;

use App\Models\Internacao;
use App\Models\Leito;
use App\Models\MovimentacaoLeito;
use App\Models\Quarto;
use App\Models\StatusLeito;
use Livewire\Component;

class LeitosCreate extends Component
{

    public $leito;
    public $atualizacao;
    public $data_criacao;
    public $quartos_id;

    public function store(){
            Leito::create([
            'leito' => $this->leito,
            'atualizacao' => $this->atualizacao,
            'data_criacao' => $this->data_criacao,
            'quartos_id' => $this->quartos_id
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('leito.index');
    }

    public function render()
    {
        $quartos = Quarto::all();
        return view('livewire.leito.leitos-create', compact('quartos'));
    }
}
