<?php

namespace App\Livewire\Leito;

use App\Models\Ala;
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
    public $alas_id;

    public function store(){
            Leito::create([
            'leito' => $this->leito,
            'atualizacao' => $this->atualizacao,
            'data_criacao' => $this->data_criacao,
            'quartos_id' => $this->quartos_id,
            'alas_id' => $this->alas_id
        ]);

        $quarto = Quarto::find($this->quartos_id);
        if($quarto != null){
            $quarto->leitos_cadastrados ++;
            $quarto->save();
        }

        session()->flash('success', 'Cadastrado');
        return redirect()->route('leito.index');
    }

    public function render()
    {
        $quartos = Quarto::all();
        $alas = Ala::all();
        return view('livewire.leito.leitos-create', compact('quartos', 'alas'));
    }
}
