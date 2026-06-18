<?php

namespace App\Livewire;

use App\Models\Internacao;
use App\Models\Leito;
use Livewire\Component;

class QrCode extends Component
{
    // Guardamos apenas tipos primitivos (strings, números) para o Livewire não travar a memória
    public $codigoQrInput = '';
    public $leito_encontrado_id = null; // Guardará apenas o ID (ex: 1, 2, 3...)
    public $novoStatus = '';
    public $responsavel = '';

    /**
     * Monitora o input de QR Code
     */
    public function updatedCodigoQrInput($value)
    {
        if (empty($value)) {
            $this->reset(['leito_encontrado_id', 'novoStatus', 'responsavel']);
            return;
        }

        // Busca apenas o ID do leito para evitar sobrecarga
        $leito = Leito::where('codigo_qr', $value)->first();

        if ($leito) {
            $this->leito_encontrado_id = $leito->id;
            $this->novoStatus = $leito->status;
        } else {
            session()->flash('error', 'Código de QR Code inválido.');
            $this->reset(['leito_encontrado_id', 'novoStatus', 'responsavel']);
        }
    }

    /**
     * Salva a alteração de status do leito
     */
    public function atualizarStatus()
    {
        if ($this->leito_encontrado_id) {
            $leito = Leito::find($this->leito_encontrado_id);
            if ($leito) {
                $leito->update([
                    'status' => $this->novoStatus
                ]);
                session()->flash('message', 'Status atualizado com sucesso!');
            }
            $this->reset(['codigoQrInput', 'leito_encontrado_id', 'novoStatus', 'responsavel']);
        }
    }

    /**
     * Renderiza a página principal
     */
    public function render()
    {
        $leitosDisponiveis = Leito::with('quartos')->get();
        
        // Buscamos o leito ativo de forma isolada dentro do render
        $leitoEncontrado = null;
        $pacienteQr = 'Sem paciente vinculado';

        if ($this->leito_encontrado_id) {
            $leitoEncontrado = Leito::with(['quartos', 'internacao.paciente'])->find($this->leito_encontrado_id);
            if ($leitoEncontrado) {
                $pacienteQr = $leitoEncontrado->internacao?->paciente?->nome ?? 'Sem paciente vinculado';
            }
        }
        
        $generator = new QRCode();

        return view('livewire.qr-code', [
            'leitosDisponiveis' => $leitosDisponiveis,
            'pacienteQr'        => $pacienteQr,
            'generator'         => $generator,
            'leito_encontrado'  => $leitoEncontrado // Enviado com segurança direto para o Blade
        ]);
    }
}
