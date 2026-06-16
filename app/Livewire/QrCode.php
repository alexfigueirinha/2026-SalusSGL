<?php

namespace App\Livewire;

use App\Models\Internacao;
use App\Models\Leito;
use Livewire\Component;

class QrCode extends Component
{

    // Campos de escaneamento e busca
    public $codigoQrInput = '';
    public $leitoSelecionado = null;
    public $pacienteAtual = 'Nenhum paciente internado';
    public $ultimaAtualizacao = '';

    // Campos do formulário de atualização de status
    public $novoStatus;
    public $responsavel;

    public function updatedCodigoQrInput($value)
    {
        if (empty($value)) {
            $this->resetLeito();
            return;
        }

        // Busca o leito pelo código (ajuste a coluna conforme seu banco, ex: 'codigo_qr' ou 'id')
        $leito = Leito::with(['quarto', 'ala'])->where('leito', $value)->first();

        if ($leito) {
            $this->leitoSelecionado = $leito->toArray();
            $this->leitoSelecionado['quarto_nome'] = $leito->quarto->quarto ?? 'N/A';
            $this->leitoSelecionado['ala_nome'] = $leito->ala->ala ?? 'N/A';
            
            // Define o status atual no select de mudança
            $this->novoStatus = $leito->atualizacao; 

            // Busca a última movimentação ativa para achar o paciente real
            $ultimaMovimentacao = Internacao::where('leitos_id', $leito->id)
                ->orderBy('id', 'desc')
                ->first();

            if ($ultimaMovimentacao && $ultimaMovimentacao->paciente) {
                $this->pacienteAtual = $ultimaMovimentacao->paciente->nome;
                $this->ultimaAtualizacao = $ultimaMovimentacao->updated_at->format('d/m/Y, H:i:s');
            } else {
                $this->pacienteAtual = 'Sem paciente vinculado';
                $this->ultimaAtualizacao = now()->format('d/m/Y, H:i:s');
            }
        } else {
            $this->resetLeito();
            session()->flash('error', 'Código de Leito não encontrado.');
        }
    }

    public function atualizarStatus()
    {
        if (!$this->leitoSelecionado) {
            session()->flash('error', 'Nenhum leito selecionado.');
            return;
        }

        $leito = Leito::find($this->leitoSelecionado['id']);
        if ($leito) {
            $leito->atualizacao = $this->novoStatus;
            $leito->save();

            // Opcional: Registrar histórico na tabela de MovimentacaoLeito aqui...

            session()->flash('success', 'Status atualizado com sucesso!');
            $this->updatedCodigoQrInput($this->codigoQrInput); // Recarrega os dados na tela
        }
    }

    private function resetLeito()
    {
        $this->leitoSelecionado = null;
        $this->pacienteAtual = 'Nenhum paciente internado';
        $this->ultimaAtualizacao = '';
    }
    
    public function render()
    {
        $leitosDisponiveis = Leito::with(['quarto', 'ala'])->get();
        return view('livewire.qr-code', compact('leitosDisponiveis'));
    }
}
