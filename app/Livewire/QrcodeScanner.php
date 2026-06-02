<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QrcodeScanner extends Component
{
    public $codigoLeito = '';
    public $mensagem = '';
    public $mensagemTipo = '';
    
    public $qrsDisponiveis = [
        ['codigo' => 'QR101A', 'leito' => '101-A', 'quarto' => '101', 'status' => 'Ocupado'],
        ['codigo' => 'QR101B', 'leito' => '101-B', 'quarto' => '101', 'status' => 'Disponível'],
        ['codigo' => 'QR101C', 'leito' => '101-C', 'quarto' => '101', 'status' => 'Em Limpeza'],
        ['codigo' => 'QR101D', 'leito' => '101-D', 'quarto' => '101', 'status' => 'Manutenção'],
        ['codigo' => 'QR101E', 'leito' => '101-E', 'quarto' => '101', 'status' => 'Ocupado'],
        ['codigo' => 'QR101F', 'leito' => '101-F', 'quarto' => '101', 'status' => 'Disponível'],
        ['codigo' => 'QR101G', 'leito' => '101-G', 'quarto' => '101', 'status' => 'Ocupado'],
        ['codigo' => 'QR101H', 'leito' => '101-H', 'quarto' => '101', 'status' => 'Reservado'],
    ];
    
    public function escanearQRCode()
    {
        if (empty($this->codigoLeito)) {
            $this->mensagem = 'Por favor, digite ou escaneie um código de leito.';
            $this->mensagemTipo = 'erro';
            return;
        }
        
        // Verifica se o QR code existe
        $qrEncontrado = collect($this->qrsDisponiveis)->firstWhere('codigo', $this->codigoLeito);
        
        if (!$qrEncontrado) {
            $this->mensagem = "QR Code '{$this->codigoLeito}' não encontrado.";
            $this->mensagemTipo = 'erro';
            return;
        }
        
        // Simula a atualização do status (você pode implementar a lógica real aqui)
        $this->mensagem = "QR Code '{$this->codigoLeito}' escaneado com sucesso! Leito {$qrEncontrado['leito']} está atualmente: {$qrEncontrado['status']}";
        $this->mensagemTipo = 'sucesso';
        
        // Aqui você pode implementar a lógica para atualizar o status do leito
        // Por exemplo: redirecionar para uma página de edição ou abrir um modal
        
        // Limpa o campo após o escaneamento bem-sucedido (opcional)
        // $this->codigoLeito = '';
    }
    
    public function selecionarQRCode($codigo)
    {
        $this->codigoLeito = $codigo;
        $this->mensagem = '';
        $this->mensagemTipo = '';
    }
    
    public function render()
    {
        return view('livewire.qrcode-scanner');
    }
}