<?php

namespace App\Livewire\Ala;

use App\Models\Ala;
use Livewire\Component;

class AlasEdit extends Component

{
    public $nome;
    public $total_quartos;
    public $quartos_cadastrados;
    public $data_criacao;
    public $descricao;
    public $alaId;

    public function mount($id){
        $ala = Ala::find($id);

        $this->alaId = $ala->id;
        $this->nome = $ala->nome;
        $this->total_quartos = $ala->data_hora;
        $this->data_criacao = $ala->data_criacao;
        $this->quartos_cadastrados = $ala->quartos_cadastrados;
        $this->descricao = $ala->descricao;

    }

    public function update(){
        $ala = Ala::find($this->alaId);

        $ala->nome = $this->nome;
        $ala->total_quartos = $this->total_quartos;
        $ala->quartos_cadastrados = $this->quartos_cadastrados;
        $ala->data_criacao = $this->data_criacao;
        $ala->descricao = $this->descricao;

        $ala->save();

     session()->flash('success','Atualizado');
        return redirect()->route('ala.index');
    }
    public function render()
    {
        return view('livewire.ala.alas-edit');
    }
}
