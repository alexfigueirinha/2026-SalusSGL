<div>
    <style>
        .qr-render img {
            width: 100px;
            height: 100px;
            display: block;
            margin: 8px auto;
        }
    </style>

    <div class="d-flex flex-column vh-100">
        <div class="border-bottom p-3 bg-white shadow-sm d-flex justify-content-between align-items-center">
            <h2 class="text-primary m-0">
                <i class="bi bi-heart-pulse"></i>
                SalusSGL
            </h2>

            @auth
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark"
                        id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 me-2 text-secondary"></i>

                        <div class="d-none d-md-flex flex-column text-start me-2">
                            <strong class="lh-1">{{ auth()->user()->name }}</strong>
                            <small class="text-muted" style="font-size: 0.75rem;">
                                {{ auth()->user()->tipo ?? 'Sem Cargo' }}
                            </small>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person me-2"></i> Meu Perfil
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                </a>
            @endauth
        </div>
        <div class="d-flex flex-grow-1">
        <div class="p-3 border-end bg-white shadow-sm" style="width: 250px;">
                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link active">
                            <i class="bi bi-grid-1x2-fill"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ala.index') }}" class="nav-link">
                            <i class="bi bi-hospital"></i>
                            Alas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('quarto.index') }}" class="nav-link">
                            <i class="bi bi-door-open"></i>
                            Quartos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('leito.index') }}" class="nav-link">
                            <i class="bi bi-activity"></i>
                            Leitos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('usuario.index') }}" class="nav-link">
                            <i class="bi bi-people-fill"></i>
                            Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('paciente.index') }}" class="nav-link">
                            <i class="bi bi-person-fill"></i>
                            Pacientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('internacao.index') }}" class="nav-link">
                            <i class="bi bi-clipboard2-data"></i>
                            Internação
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('movimentacaoLeito.index') }}" class="nav-link">
                            <i class="bi bi-clock-history"></i>
                            Histórico
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('qrCode') }}" class="nav-link">
                            <i class="bi bi-qr-code"></i>
                            QR Code
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-gear"></i>
                            Configurações
                        </a>

                    </li>
                </ul>
            </div>

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
                                        <input type="text" wire:model.live.debounce.500ms="codigoQrInput"
                                            id="inputQr" placeholder="Exemplo: QR101A, QR102B..." autofocus
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
                                                <select wire:model="novoStatus" class="form-select"
                                                    style="border-radius: 6px;">
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
