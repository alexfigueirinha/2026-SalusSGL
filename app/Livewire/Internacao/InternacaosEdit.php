<?php

namespace App\Livewire\Internacao;

use App\Models\Ala;
use App\Models\Internacao;
use App\Models\Leito;
use App\Models\Paciente;
use App\Models\Quarto;
use Livewire\Component;

class InternacaosEdit extends Component
{
    public $data_hora_entrada;
    public $data_hora_saida;
    public $pacientes_id;
    public $leitos_id;
    public $alas_id;
    public $quartos_id;
    public $motivo;
    public $solicitado_por;
    public $observacoes;
    public $internacao_original_ala_id;
    public $internacao_original_quarto_id;
    public $internacao_original_leito_id;
    public $internacaoId;

    public function mount($id)
    {
        $internacao = Internacao::find($id);

        if ($internacao == null) {
            session()->flash('error', 'não encontrado');
            return redirect()->route('internacao.index');
        }

        $this->internacaoId = $internacao->id;
        $this->data_hora_entrada = $internacao->data_hora_entrada;
        $this->data_hora_saida = $internacao->data_hora_saida;
        $this->pacientes_id = $internacao->pacientes_id;
        $this->leitos_id = $internacao->leitos_id;
        $this->alas_id = $internacao->alas_id;
        $this->quartos_id = $internacao->quartos_id;
        $this->internacao_original_ala_id = $internacao->alas_id;
        $this->internacao_original_quarto_id = $internacao->quartos_id;
        $this->internacao_original_leito_id = $internacao->leitos_id;
    }

    public function update()
    {
        // 1. Busca a internação atual no banco de dados
        $internacao = Internacao::find($this->internacaoId);

        if ($internacao == null) {
            session()->flash('error', 'Não encontrado');
            return redirect()->route('internacao.index');
        }

        // 2. VERIFICAÇÃO: Se a ala, o quarto OU o leito mudaram em relação ao banco de dados
        if (
            $internacao->alas_id != $this->alas_id ||
            $internacao->quartos_id != $this->quartos_id ||
            $internacao->leitos_id != $this->leitos_id
        ) {

            // --- BUSCA OS NOMES DO ESTADO ANTIGO (DO BANCO) ---
            $alaAntiga    = \App\Models\Ala::find($internacao->alas_id);
            $quartoAntigo = \App\Models\Quarto::find($internacao->quartos_id);
            $leitoAntigo  = \App\Models\Leito::find($internacao->leitos_id);

            // --- BUSCA OS NOMES DO ESTADO NOVO (DO FORMULÁRIO) ---
            $alaNova    = \App\Models\Ala::find($this->alas_id);
            $quartoNova = \App\Models\Quarto::find($this->quartos_id);
            $leitoNovo  = \App\Models\Leito::find($this->leitos_id);

            // --- MONTA AS STRINGS AMIGÁVEIS (Ex: UTI - Q.01 - L.1) ---
            $txtOrigem = ($alaAntiga?->nome ?? 'Sem Ala') . ' - ' .
                ($quartoAntigo?->quarto ?? 'Sem Quarto') . ' - ' .
                ($leitoAntigo?->leito ?? 'Sem Leito');

            $txtDestino = ($alaNova?->nome ?? 'Sem Ala') . ' - ' .
                ($quartoNova?->quarto ?? 'Sem Quarto') . ' - ' .
                ($leitoNovo?->leito ?? 'Sem Leito');

            // --- SALVA O REGISTRO NA TABELA DE MOVIMENTAÇÕES ---
            \App\Models\MovimentacaoLeito::create([
                'internacao_id'  => $internacao->id,
                'paciente_id'    => $internacao->pacientes_id,
                'movimentacao'   => "{$txtOrigem} -> {$txtDestino}",
                'motivo'         => $this->motivo ?? 'Transferência hospitalar',
                'solicitado_por' => $this->solicitado_por ?? 'Não informado',
                'aprovado_por'   => \Illuminate\Support\Facades\Auth::user()?->name ?? 'Sistema',
                'observacoes'    => $this->observacoes ?? null,
            ]);
        }

        // 3. ATUALIZAÇÃO: Aplica os novos dados do formulário no objeto do banco
        $internacao->data_hora_entrada = $this->data_hora_entrada;
        $internacao->data_hora_saida   = $this->data_hora_saida;
        $internacao->pacientes_id      = $this->pacientes_id;
        $internacao->alas_id           = $this->alas_id;
        $internacao->quartos_id        = $this->quartos_id;
        $internacao->leitos_id         = $this->leitos_id;

        // 4. SALVAR: Grava definitivamente as alterações na tabela de internações
        $internacao->save();

        // 5. REDIRECIONAMENTO E FEEDBACK
        session()->flash('success', 'Atualizado com sucesso!');
        return redirect()->route('internacao.index');
    }

    public function render()
    {
        $pacientes = Paciente::all();
        $alas = Ala::all();
        $quartos = Quarto::all();
        $leitos = Leito::all();
        return view('livewire.internacao.internacaos-edit', compact('pacientes', 'alas', 'quartos', 'leitos'));
    }
}
