<?php

namespace App\Livewire;

use App\Models\Ala;
use App\Models\Leito;
use App\Models\Paciente;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalLeitos;
    public $leitosOcupados;
    public $leitosDisponiveis;
    public $taxaOcupacao;
    public $totalAlas;
    public $pacientesInternados;
    
    // CLIQUE AQUI E ADICIONE ESTA LINHA:
    public $alas; 

           public function mount()
    {
        $this->totalLeitos = Leito::count();
        
        $this->leitosOcupados = Leito::whereHas('statusLeitos', function($q) {
            $q->where('status', 'ocupado');
        })->count();

        $this->leitosDisponiveis = Leito::whereHas('statusLeitos', function($q) {
            $q->where('status', 'disponivel');
        })->count();

        $this->pacientesInternados = Paciente::count(); 
        $this->totalAlas = Ala::count(); 

        $this->alas = Ala::with('leitos.statusLeitos')->get();

        $this->taxaOcupacao = $this->totalLeitos > 0
            ? round(($this->leitosOcupados / $this->totalLeitos) * 100, 1)
            : 0;
    }


    public function render()
    {
        return view('livewire.dashboard');
    }
}
