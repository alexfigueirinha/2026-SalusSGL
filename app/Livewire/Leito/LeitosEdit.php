<?php

namespace App\Livewire\Leito;

use App\Models\Leito;
use Livewire\Component;

class LeitosEdit extends Component
{

    public $nome_paciente;
    public $atualizacao;
    public $quartos_id;
    public $leitoId;

    public function mount($id){
        $leito = Leito::find($id);

        $this->nome_paciente = $leito->nome_paciente;
        $this->atualizacao = $leito->atualizacao;
        $this->quartos_id = $leito->quartos_id;
        $this->leitoId = $leito->id;
        
    }

    public function update(){
        $leito = Leito::find($this->leitoId);

        $leito->nome_paciente = $this->nome_paciente;
        $leito->atualizacao = $this->atualizacao;
        $leito->quartos_id = $this->quartos_id;
        

        $leito->save();

     session()->flash('success','Atualizado');
        return redirect()->route('leito.index');
    }
    
    public function render()
    {
        return view('livewire.leito.leitos-edit');
    }
}
