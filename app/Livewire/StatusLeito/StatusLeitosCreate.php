<?php

namespace App\Livewire\StatusLeito;

use App\Models\Leito;
use App\Models\StatusLeito;
use Livewire\Component;

class StatusLeitosCreate extends Component
{

    public $status;
    public $leitos_id;

     public function store(){
            StatusLeito::create([
            'status' => $this->status,
            'leitos_id' => $this->leitos_id
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('status.leito.index');
    }

    public function leitos() {
    return $this->belongsTo(Leito::class); 
    }

    public function render()
    {
        return view('livewire.status-leito.status-leitos-create');
    }
}
