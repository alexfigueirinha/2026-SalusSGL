<?php

namespace App\Livewire\Leito;

use App\Models\Leito;
use Livewire\Component;

class LeitosCreate extends Component
{

    public $nome_paciente;
    public $atualizacao;
    public $quartos_id;

    public function store(){
            Leito::create([
            'nome_paciente' => $this->nome_paciente,
            'atuzlizacao' => $this->atualizacao,
            'quartos_id' => $this->quartos_id,
    
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('leito.index');
    }

    public function render()
    {
        return view('livewire.leito.leitos-create');
    }
}
