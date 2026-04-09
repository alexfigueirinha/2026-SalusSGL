<?php

namespace App\Livewire\Ala;

use App\Models\Ala;
use App\Models\Quarto;
use Livewire\Component;

class AlasCreate extends Component
{

    public $nome;
    public $total_quartos;
    public $data_criacao;
    public $quartos_cadastrados;
    public $descricao;

    public function store(){
        Ala::create([
            'nome' => $this->nome,
            'total_quartos' => $this->total_quartos,
            'data_criacao' => $this->data_criacao,
            'quartos_cadastrados' => $this->quartos_cadastrados,
            'descricao' => $this->descricao
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('ala.index');
    }

    public function quartos() {
    return $this->hasMany(Quarto::class); 
    }
    
    public function render()
    {
        return view('livewire.ala.alas-create');
    }
}
