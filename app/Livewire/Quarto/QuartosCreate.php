<?php

namespace App\Livewire\Quarto;

use App\Models\Ala;
use App\Models\Internacao;
use App\Models\Leito;
use App\Models\Quarto;
use Livewire\Component;

class QuartosCreate extends Component
{
    public $quarto;
    public $total_leitos;
    public $data_criacao;
    public $leitos_cadastrados;
    public $alas_id;

    public function store()
    {
        Quarto::create([
            'quarto' => $this->quarto,
            'total_leitos' => $this->total_leitos,
            'data_criacao' => $this->data_criacao,
            'leitos_cadastrados' => 0,
            'alas_id' => $this->alas_id
        ]);
        $ala = Ala::find($this->alas_id);
        if($ala != null){
            $ala->quartos_cadastrados ++;
            $ala->save();
        }

        session()->flash('success', 'Cadastrado');
        return redirect()->route('quarto.index');
    }

    public function render()
    {
        $alas = Ala::all();
        return view('livewire.quarto.quartos-create', compact('alas'));
    }
}
