<div>
    
    <div class="d-flex flex-column vh-100">
        <!-- TOPO -->
        <div class="border-bottom p-3 bg-white shadow-sm">
            <h2 class="text-primary m-0">
                <i class="bi bi-heart-pulse"></i>
                SalusSGL
            </h2>
        </div>
        <!-- CONTEÚDO -->
        <div class="d-flex flex-grow-1">
            <!-- SIDEBAR -->
            <div class="p-3 border-end bg-white shadow-sm" style="width: 250px;">
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
                            Internacao
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
                    <th>ID</th>
                    <th>Quarto</th>
                    <th>Leito</th>
                    <th>Status</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($leitos as $leito)
                <tr>
                    <td>{{ $leito->id }}</td>
                    <td>{{ $leito->quartos_id }}</td>
                    <td>{{ $leito->leito }}</td>
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
                        <button wire:click='delete({{ $leito->id }})' class="btn btn-sm btn-danger">Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>