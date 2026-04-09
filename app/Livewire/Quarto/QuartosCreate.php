<?php

namespace App\Livewire\Quarto;

use App\Models\Ala;
use App\Models\Leito;
use App\Models\Quarto;
use Livewire\Component;

class QuartosCreate extends Component
{
    public $quarto;
    public $total_leitos;
    public $alas_id;

    public function store()
    {
        Quarto::create([
            'quarto' => $this->quarto,
            'total_leitos' => $this->total_leitos,
            'alas_id' => $this->alas_id
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('quarto.index');
    }

    public function leitos() {
    return $this->hasMany(Leito::class); 
    }

    public function ala() {
    return $this->belongsTo(Ala::class); 
    }

    public function render()
    {
        $alas = Ala::all();
        return view('livewire.quarto.quartos-create', compact('alas'));
    }
}
