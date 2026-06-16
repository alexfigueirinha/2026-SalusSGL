<?php

namespace App\Livewire\Movimentacao;

use App\Models\MovimentacaoLeito;
use Livewire\Component;
use Livewire\WithPagination;

class MovimentacoesLeitosIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $mov = MovimentacaoLeito::find($id);
        if ($mov) {
            $mov->delete();
            session()->flash('success', 'Movimentação excluída do histórico.');
        }
    }

    public function render()
    {
        // Busca trazendo os relacionamentos do banco filtrando por busca
        $movimentacoes = MovimentacaoLeito::with(['paciente', 'leito.quarto'])
            ->when($this->search, function ($query) {
                $query->whereHas('paciente', function ($q) {
                    $q->where('nome', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Estatísticas dos cards inferiores da tela
        $totalMovimentacoes = MovimentacaoLeito::count();
        $ultimas24Horas = MovimentacaoLeito::where('created_at', '>=', now()->subDay())->count();
        $ultimaMovimentacao = MovimentacaoLeito::with('paciente')->orderBy('created_at', 'desc')->first();

        return view('livewire.movimentacao.movimentacoes-leitos-index', compact(
            'movimentacoes',
            'totalMovimentacoes',
            'ultimas24Horas',
            'ultimaMovimentacao'
        ));
    }
}
