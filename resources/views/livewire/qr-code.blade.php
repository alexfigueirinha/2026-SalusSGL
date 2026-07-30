<div>
    <style>
        .qr-render img {
            width: 100px;
            height: 100px;
            display: block;
            margin: 8px auto;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card shadow-sm border-0" style="border-radius: 12px;">
                    <div class="card-header bg-primary text-white d-flex align-items-center"
                        style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
                        <i class="fas fa-qrcode me-2"></i>
                        <h5 class="card-title mb-0" style="font-weight: 600;">Scanner de QR Code</h5>
                    </div>

                    <div class="card-body p-4">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i> {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="inputQr" class="form-label text-muted"
                                style="font-size: 14px; font-weight: 500;">Bipe o código ou digite aqui</label>
                            <div style="position: relative;">
                                <input type="text" wire:model.live.debounce.500ms="codigoQrInput" id="inputQr"
                                    placeholder="Exemplo: QR101A, QR102B..." autofocus
                                    class="form-control form-control-lg text-center"
                                    style="border-radius: 8px; border: 1px solid #cbd5e1; font-weight: 600; letter-spacing: 1px;">
                            </div>
                        </div>

                        @if ($leito_encontrado)
                            <div class="p-3 mb-4"
                                style="border: 1px solid #dbeafe; background-color: rgba(239, 246, 255, 0.7); border-radius: 8px;">
                                <h6 class="text-primary mb-3" style="font-weight: 600;"><i
                                        class="fas fa-bed me-2"></i>Dados do Leito Encontrado</h6>

                                <table class="table table-borderless table-sm mb-0" style="font-size: 14px;">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted" style="width: 35%;">Identificação:</td>
                                            <td class="fw-bold text-dark">{{ $leito_encontrado->identificacao }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Quarto:</td>
                                            <td class="fw-bold text-dark">
                                                {{ $leito_encontrado->quartos->descricao ?? 'Sem quarto cadastrado' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Paciente Atual:</td>
                                            <td class="fw-bold text-danger">{{ $pacienteQr }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <hr class="text-muted my-3" style="opacity: 0.15;">

                                <form wire:submit.prevent="atualizarStatus">
                                    <div class="mb-3">
                                        <label class="form-label text-muted"
                                            style="font-size: 13px; font-weight: 500;">Alterar Status do
                                            Leito</label>
                                        <select wire:model="novoStatus" class="form-select" style="border-radius: 6px;">
                                            <option value="Disponível">Disponível</option>
                                            <option value="Ocupado">Ocupado</option>
                                            <option value="Manutenção">Manutenção</option>
                                            <option value="Limpeza">Limpeza</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success w-100 style-button"
                                        style="border-radius: 6px; font-weight: 500;">
                                        <i class="fas fa-save me-2"></i>Salvar Alterações
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="text-center py-4 text-muted">
                                <i class="fas fa-barcode fa-3x mb-2" style="opacity: 0.3;"></i>
                                <p class="mb-0" style="font-size: 14px;">Aguardando leitura do QR Code...
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
