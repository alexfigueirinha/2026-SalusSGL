<div>
    <div class="d-flex flex-column vh-100">
        <!-- TOPO -->
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
        <!-- CONTEÚDO -->
        <div class="d-flex flex-grow-1">
            <!-- SIDEBAR -->
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

            <main class="flex-grow-1 d-flex justify-content-center align-items-center p-4">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <form class="card p-4 shadow align-content-center" wire:submit.prevent="store">
                                <h3 class="d-flex align-items-center">
                                    <i class="bi bi-door-open me-1 fs-3"></i>
                                    Registrar Internação
                                </h3>
                                <select class="mb-2 form-select" wire:model='pacientes_id'
                                    aria-label="Default select example">
                                    <option selected>Selecione o paciente</option>
                                    @foreach ($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                                    @endforeach
                                </select>
                                <select class="mb-2 form-select" wire:model='alas_id'
                                    aria-label="Default select example">
                                    <option selected>Selecione a ala</option>
                                    @foreach ($alas as $ala)
                                        <option value="{{ $ala->id }}">{{ $ala->nome }}</option>
                                    @endforeach
                                </select>
                                <select class="mb-2 form-select" wire:model='quartos_id'
                                    aria-label="Default select example">
                                    <option selected>Selecione o quarto</option>
                                    @foreach ($quartos as $quarto)
                                        <option value="{{ $quarto->id }}">{{ $quarto->quarto }}</option>
                                    @endforeach
                                </select>
                                <select class="mb-2 form-select" wire:model='leitos_id'
                                    aria-label="Default select example">
                                    <option selected>Selecione o leito</option>
                                    @foreach ($leitos as $leito)
                                        <option value="{{ $leito->id }}">{{ $leito->leito }}</option>
                                    @endforeach
                                </select>
                                <div class="d-flex justify-content-end gap-2 mt-3">
                                    <button type="button" class="btn btn-outline-primary">Cancelar</button>
                                    <button class="btn btn-primary" type="submit">
                                        Criar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @if ($leitos_id != $internacao_original_leito_id)
            <div class="row border p-3 mb-3 bg-light rounded animate__animated animate__fadeIn">
                <p class="text-warning fw-bold">⚠️ Atenção: Você está alterando o leito. Preencha os dados da
                    movimentação:</p>
                <div class="col-md-6 mb-3">
                    <label>Motivo da Movimentação</label>
                    <input type="text" class="form-control" wire:model="motivo">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Solicitado Por</label>
                    <input type="text" class="form-control" wire:model="solicitado_por">
                </div>
            </div>
        @endif
        
