<div>
    <div class="d-flex flex-column vh-100">
        <div class="border-bottom p-3 bg-white shadow-sm">
            <h2 class="text-primary m-0">
                <i class="bi bi-heart-pulse"></i>
                SalusSGL
            </h2>
        </div>
        <div class="d-flex flex-grow-1">
            <div class="p-3 border-end bg-white shadow-sm" style="width: 250px; flex-shrink: 0;">
                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
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
                        <a href="#" class="nav-link">
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

            <div class="container-fluid p-4 overflow-auto flex-grow-1">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="m-0">Histórico de Movimentações</h2>
                </div>

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

                <div class="mb-3">
                    <input type="text" wire:model.live='search' placeholder="Pesquisar..." class="form-control">
                </div>

                <div class="table-responsive bg-white rounded shadow-sm mb-4">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Paciente</th>
                                <th>Movimentação</th>
                                <th>Motivo</th>
                                <th>Solicitado Por</th>
                                <th>Aprovado Por</th>
                                <th>Observações</th>
                                <th>Data/Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($historicos as $hist)
                                <tr>
                                    <td>{{ $hist->id }}</td>
                                    <td class="fw-bold">{{ $hist->paciente->nome }}</td>
                                    <td><span class="badge bg-secondary p-2">{{ $hist->movimentacao }}</span></td>
                                    <td>{{ $hist->motivo ?? '-' }}</td>
                                    <td>{{ $hist->solicitado_por ?? '-' }}</td>
                                    <td>{{ $hist->aprovado_por ?? '-' }}</td>
                                    <td>{{ $hist->observacoes ?? '-' }}</td>
                                    <td>
                                        <strong>{{ $hist->created_at->format('d/m/Y') }}</strong><br>
                                        <small class="text-muted">{{ $hist->created_at->format('H:i:s') }}</small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">Nenhuma movimentação
                                        encontrada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="row g-3 mt-2 mb-4">
                    <div class="col-md-4">
                        <div class="card p-3 shadow-sm border-0 h-100">
                            <small class="text-muted fw-bold text-uppercase mb-1" style="font-size: 0.75rem;">Total de
                                Movimentações</small>
                            <h3 class="m-0 text-dark fw-bold">{{ $totalMovimentacoes }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3 shadow-sm border-0 h-100">
                            <small class="text-muted fw-bold text-uppercase mb-1" style="font-size: 0.75rem;">Últimas 24
                                horas</small>
                            <h3 class="m-0 text-dark fw-bold">{{ $ultimas24h }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-center">
                            <small class="text-muted fw-bold text-uppercase mb-1" style="font-size: 0.75rem;">Última
                                Movimentação</small>
                            @if ($ultimaMovimentacao && $ultimaMovimentacao->paciente)
                                <h6 class="m-0 text-dark fw-bold text-truncate">
                                    {{ $ultimaMovimentacao->paciente->nome }}</h6>
                                <small
                                    class="text-muted">{{ $ultimaMovimentacao->created_at->format('d/m/Y H:i') }}</small>
                            @else
                                <p class="m-0 text-muted fw-bold">-</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
