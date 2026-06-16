<?php

namespace App\Livewire\MovimentacaoLeito;

use App\Models\MovimentacaoLeito;
use Livewire\Component;

class MovimentacaoLeitosIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $movimentacaoLeito = MovimentacaoLeito::find($id);

        if ($movimentacaoLeito != null) {
            $movimentacaoLeito->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()
    {
        $historicos = MovimentacaoLeito::with('paciente')
            ->whereHas('paciente', function ($query) {
                $query->where('nome', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // Cálculos dos Cards inferiores (Figma)
        $totalMovimentacoes = MovimentacaoLeito::count();
        $ultimas24h = MovimentacaoLeito::where('created_at', '>=', now()->subDay())->count();
        $ultimaMovimentacao = MovimentacaoLeito::with('paciente')->latest()->first();

        return view('livewire.movimentacao-leito.movimentacao-leitos-index', compact('historicos', 'totalMovimentacoes', 'ultimas24h', 'ultimaMovimentacao'));
    }
}
