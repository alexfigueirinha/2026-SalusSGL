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

    public $nome_paciente;
    public $atualizacao;
    public $quartos_id;

    public function store(){
            Leito::create([
            'nome_paciente' => $this->nome_paciente,
            'atuzlizacao' => $this->atualizacao,
            'quartos_id' => $this->quartos_id
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('leito.index');
    }

    public function quartos() {
    return $this->belongsTo(Quarto::class); 
    }

    public function statusLeitos() {
    return $this->hasMany(StatusLeito::class); 
    }

    public function movimentacaoLeito() {
    return $this->hasMany(MovimentacaoLeito::class); 
    }

    public function internacaos() {
    return $this->hasMany(Internacao::class); 
    }

    public function render()
    {
        return view('livewire.leito.leitos-create');
    }
}
