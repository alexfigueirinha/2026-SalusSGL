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
                   
                </ul>
            </div>

            <div class="container">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mt-4">Leitos</h2>
                    <div class="d-flex gap-2">
                        <a class="btn btn-primary mt-4" href="{{ route('leito.create') }}">Novo Leito</a>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="text" wire:model.live='search' placeholder="Pesquisar..." class="form-control">
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ala</th>
                            <th>Quarto</th>
                            <th>Leito</th>
                            <th>QR Code</th>
                            <th>Status</th>
                            <th>Data de Criação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($leitos as $leito)
                            <tr>
                                <td>{{ $leito->id }}</td>
                                <td>{{ $leito->alas->nome }}</td>
                                <td>{{ $leito->quartos->quarto }}</td>
                                <td>{{ $leito->leito }}</td>
                                <td>
                                    @if (!empty($leito->codigo_qr))
                                        <div
                                            style="background: white; padding: 4px; display: inline-block; border: 1px solid #dee2e6; border-radius: 6px;">
                                            <img src="https://chart.googleapis.com/chart?chs=70x70&cht=qr&chl={{ urlencode($leito->codigo_qr) }}&choe=UTF-8"
                                                alt="QR Code" style="width: 60px; height: 60px;">
                                            <div
                                                style="font-size: 10px; color: #6c757d; font-weight: bold; margin-top: 1px;">
                                                {{ $leito->codigo_qr }}
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-muted" style="font-size: 12px;">Não gerado</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($leito->atualizacao == 'disponivel')
                                        <span class="badge bg-success">Disponível</span>
                                    @elseif ($leito->atualizacao == 'ocupado')
                                        <span class="badge bg-danger">Ocupado</span>
                                    @elseif ($leito->atualizacao == 'em_limpeza')
                                        <span class="badge bg-info">Em Limpeza</span>
                                    @elseif ($leito->atualizacao == 'reservado')
                                        <span class="badge bg-warning">Reservado</span>
                                    @elseif ($leito->atualizacao == 'manutencao')
                                        <span class="badge bg-secondary">Manutenção</span>
                                    @elseif ($leito->atualizacao == 'emergencia')
                                        <span class="badge bg-light">Emergência</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($leito->data_criacao)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('leito.edit', ['id' => $leito->id]) }}"
                                        class="btn btn-primary btn-sm">Editar</a>
                                    <button wire:click='delete({{ $leito->id }})'
                                        class="btn btn-sm btn-danger">Excluir</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
