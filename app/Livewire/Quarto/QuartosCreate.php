<?php

namespace App\Livewire\Quarto;

use App\Models\Quarto;
use Livewire\Component;

class QuartosCreate extends Component
{
    public $nome;
    public $total_leitos;
    public $alas_id;

    public function store()
    {
        Quarto::create([
            'nome' => $this->nome,
            'total_leitos' => $this->total_leitos,
            'alas_id' => $this->alas_id
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('quarto.index');
    }

    public function render()
    {
        return view('livewire.quarto.quartos-create');
    }
}
