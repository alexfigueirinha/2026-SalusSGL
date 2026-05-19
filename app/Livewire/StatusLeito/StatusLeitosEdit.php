<?php

namespace App\Livewire\StatusLeito;

use App\Models\StatusLeito;
use Livewire\Component;

class StatusLeitosEdit extends Component
{

    public $status;
    public $leitos_id;
    public $statusLeito_id;

    public function mount($id){
        $statusLeito = StatusLeito::find($id);

         if ($statusLeito == null) {
            session()->flash('error', 'não encontrado');
            return redirect()->route('statusLeito.index');

        $this->status = $statusLeito->status;
        $this->leitos_id = $statusLeito->leitos_id;
        $this->statusLeito_id = $statusLeito->id;
        
    }

}

    public function update(){
        $statusLeito = StatusLeito::find($this->leitoId);

         if ($statusLeito == null) {
            session()->flash('error', 'não encontrado');
            return redirect()->route('statusLeito.index');


        $statusLeito->status = $this->status;
        $statusLeito->leitos_id = $this->leitos_id;
        

        $statusLeito->save();

     session()->flash('success','Atualizado');
        return redirect()->route('status.leito.index');
    }

}
    public function render()
    {
        return view('livewire.status-leito.status-leitos-edit');
    }
}
