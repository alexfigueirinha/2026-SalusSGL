<?php

namespace App\Livewire\Leito;

use App\Models\Ala;
use App\Models\Internacao;
use App\Models\Leito;
use App\Models\MovimentacaoLeito;
use App\Models\Quarto;
use App\Models\StatusLeito;
use Livewire\Component;

class LeitosCreate extends Component
{
    public $leito;
    public $atualizacao;
    public $data_criacao;
    public $quartos_id;
    public $alas_id;
    public $codigo_qr;

    // Propriedade para exibir a imagem do QR Code gerado na tela após salvar
    public $qrCodeUrlResult = null;
    public $codigoIdentificador = null;

    public function store()
    {
        $this->validate([
            'leito' => 'required',
            'atualizacao' => 'required',
            'quartos_id' => 'required',
            'alas_id' => 'required',
        ], [
            'leito.required' => 'O número do leito é obrigatório.',
            'atualizacao.required' => 'Selecione um status inicial.',
            'quartos_id.required' => 'Selecione o quarto.',
            'alas_id.required' => 'Selecione a ala.',
        ]);

        // 1. GERAÇÃO DO TEXTO DO QR CODE (Padrão: QR102B)
        $leitoLimpo = str_replace([' ', '-'], '', $this->leito);
        $this->codigoIdentificador = 'QR' . strtoupper($leitoLimpo);

        // 2. GERAÇÃO DA IMAGEM REAL DO QR CODE (via Google API)
        // Esse link gera um QR Code de 250x250 pixels contendo o texto identificador
        $this->qrCodeUrlResult = "https://googleapis.com" . urlencode($this->codigoIdentificador) . "&choe=UTF-8";

        // 3. SALVA NO BANCO DE DADOS
        Leito::create([
            'leito' => $this->leito,
            'atualizacao' => $this->atualizacao,
            'data_criacao' => $this->data_criacao ?? now()->format('Y-m-d'),
            'quartos_id' => $this->quartos_id,
            'alas_id' => $this->alas_id,
            'codigo_qr' => $this->codigo_qr // Salva o identificador real
        ]);

        // 4. ATUALIZA CONTADOR DO QUARTO
        $quarto = Quarto::find($this->quartos_id);
        if ($quarto != null) {
            $quarto->leitos_cadastrados++;
            $quarto->save();
        }

        session()->flash('success', 'Leito cadastrado e QR Code gerado com sucesso!');
        
        // OPCIONAL: Se quiser ir direto para a listagem, descomente a linha abaixo.
        // Se deixar comentada, a página continua aberta mostrando o QR Code pronto para impressão.
        // return redirect()->route('leito.index');
    }

    public function render()
    {
        $quartos = Quarto::all();
        $alas = Ala::all();
        return view('livewire.leito.leitos-create', compact('quartos', 'alas'));
    }
}
