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

            <!-- ÁREA DOS CARDS DO DASHBOARD (COM ATUALIZAÇÃO AUTOMÁTICA EM TEMPO REAL) -->
            <div class="flex-grow-1 p-4 overflow-y-auto" wire:poll.3s>

                <!-- 1. CABEÇALHO INTERNO -->
                <div class="mb-4">
                    <h3 class="fw-bold text-dark m-0">Dashboard</h3>
                    <p class="text-muted small mt-1">Monitoramento em tempo real dos leitos hospitalares</p>
                </div>

                <!-- 2. CARDS SUPERIORES (INDICADORES) -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-3">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="d-flex justify-content-between align-items-start text-secondary">
                                <span class="text-uppercase small fw-bold">Total de Leitos</span>
                                <i class="bi bi-hospital fs-5 text-muted"></i>
                            </div>
                            <div class="mt-2">
                                <h3 class="fw-bold m-0 text-dark">{{ $totalLeitos }}</h3>
                                <p class="text-muted small m-0 mt-1">Em {{ $totalAlas }} alas</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="d-flex justify-content-between align-items-start text-secondary">
                                <span class="text-uppercase small fw-bold">Taxa de Ocupação</span>
                                <i class="bi bi-percent fs-5 text-muted"></i>
                            </div>
                            <div class="mt-2">
                                <h3 class="fw-bold m-0 text-dark">{{ $taxaOcupacao }}%</h3>
                                <p class="text-muted small m-0 mt-1">{{ $leitosOcupados }} ocupados</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="d-flex justify-content-between align-items-start text-secondary">
                                <span class="text-uppercase small fw-bold">Leitos Disponíveis</span>
                                <i class="bi bi-check-circle fs-5 text-muted"></i>
                            </div>
                            <div class="mt-2">
                                <h3 class="fw-bold m-0 text-dark">{{ $leitosDisponiveis }}</h3>
                                <p class="text-success small fw-medium m-0 mt-1">Prontos para uso</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="d-flex justify-content-between align-items-start text-secondary">
                                <span class="text-uppercase small fw-bold">Pacientes Internados</span>
                                <i class="bi bi-person fs-5 text-muted"></i>
                            </div>
                            <div class="mt-2">
                                <h3 class="fw-bold m-0 text-dark">{{ $pacientesInternados }}</h3>
                                <p class="text-muted small m-0 mt-1">Ativos no sistema</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. SUB-CARDS DE FILTROS/STATUS RÁPIDOS -->
                <div class="row g-2 mb-4">
                    <div class="col-6 col-md-2">
                        <div class="p-2 rounded bg-success bg-opacity-10 border border-success border-opacity-25 text-success">
                            <span class="small fw-bold d-block">● Disponível</span>
                            <span class="fs-4 fw-bold mt-1 d-block">{{ $leitosDisponiveis }}</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="p-2 rounded bg-danger bg-opacity-10 border border-danger border-opacity-25 text-danger">
                            <span class="small fw-bold d-block">▲ Ocupado</span>
                            <span class="fs-4 fw-bold mt-1 d-block">{{ $leitosOcupados }}</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="p-2 rounded bg-warning bg-opacity-10 border border-warning border-opacity-25 text-warning">
                            <span class="small fw-bold d-block">🧽 Limpeza</span>
                            <span class="fs-4 fw-bold mt-1 d-block">0</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="p-2 rounded bg-info bg-opacity-10 border border-info border-opacity-25 text-info">
                            <span class="small fw-bold d-block">🛠 Manutenção</span>
                            <span class="fs-4 fw-bold mt-1 d-block">0</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="p-2 rounded bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary">
                            <span class="small fw-bold d-block">🚨 Emergência</span>
                            <span class="fs-4 fw-bold mt-1 d-block">0</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="p-2 rounded bg-secondary bg-opacity-10 border border-secondary border-opacity-25 text-secondary">
                            <span class="small fw-bold d-block">📅 Reservado</span>
                            <span class="fs-4 fw-bold mt-1 d-block">0</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
