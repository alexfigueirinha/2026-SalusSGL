<?php

namespace App\Livewire\MovimentacaoLeito;

use App\Models\MovimentacaoLeito;
use Livewire\Component;

class MovimentacaoLeitosEdit extends Component
{

    public $quartos_id;
    public $leitos_id;
    public $usuarios_id;
    public $movimentacaoLeitoId;

    public function mount($id){
        $movimentacaoLeito = MovimentacaoLeito::find($id);

        $this->quartos_id = $movimentacaoLeito->quartos_id;
        $this->leitos_id = $movimentacaoLeito->leitos_id;
        $this->usuarios_id = $movimentacaoLeito->usuarios_id;
        $this->movimentacaoLeitoId = $movimentacaoLeito->id;
        
        }

    public function update(){
        $movimentacaoLeito = MovimentacaoLeito::find($this->leitoId);

        $movimentacaoLeito->quartos_id = $this->quartos_id;
        $movimentacaoLeito->leitos_id = $this->leitos_id;
        $movimentacaoLeito->usarios_id = $this->usuarios_id;

        $movimentacaoLeito->save();

     session()->flash('success','Atualizado');
        return redirect()->route('movimentacao.leito.index');
    }

    public function render()
    {
        return view('livewire.movimentacao-leito.movimentacao-leitos-edit');
    }
}
