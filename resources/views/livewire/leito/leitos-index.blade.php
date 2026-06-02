<div>
<<<<<<< HEAD
    
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
                        <a href="{{ route('movimentacao.leito.index') }}" class="nav-link">
                            <i class="bi bi-clipboard2-data"></i>
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
=======
    <div class="b-example-divider"></div>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <i class="bi bi-heart-pulse me-2 fs-2"></i>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <h3 class="text-primary bold">SalusSGL</h3>
>>>>>>> e18a56413ba2e257a9d1ebb7dce529a2213c5f25
                    </li>
                </ul>
            </div>

    <div class="container mt-5">
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