<?php

namespace App\Livewire;

use App\Models\Ala;
use App\Models\Leito;
use App\Models\Paciente;
use App\Models\Internacao;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalLeitos;
    public $leitosOcupados;
    public $leitosDisponiveis;
    public $taxaOcupacao;
    public $totalAlas;
    public $pacientesInternados;
    public $alas;
    public $leitosLimpeza;
    public $leitosManutencao;
    public $leitosEmergencia;
    public $leitosReservados;

    public function mount()
    {
        $this->atualizarDados();
    }

    public function atualizarDados()
    {
        // Total de leitos
        $this->totalLeitos = Leito::count();
        
        // Total de alas
        $this->totalAlas = Ala::count();
        
        // Carregar todas as alas com seus leitos
        $this->alas = Ala::with(['leitos.internacaoAtiva.paciente'])
            ->whereHas('leitos')
            ->get();
        
        // Contar por status diretamente da tabela leitos
        $this->leitosDisponiveis = Leito::where('status', 'disponivel')->count();
        $this->leitosOcupados = Leito::where('status', 'ocupado')->count();
        $this->leitosLimpeza = Leito::where('status', 'em_limpeza')->count();
        $this->leitosManutencao = Leito::where('status', 'manutencao')->count();
        $this->leitosEmergencia = Leito::where('status', 'emergencia')->count();
        $this->leitosReservados = Leito::where('status', 'reservado')->count();
        
        // Pacientes internados
        $this->pacientesInternados = Internacao::whereNull('data_hora_saida')->count();
        
        // Calcular taxa de ocupação
        $this->taxaOcupacao = $this->totalLeitos > 0
            ? round(($this->leitosOcupados / $this->totalLeitos) * 100, 1)
            : 0;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}