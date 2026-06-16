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
                            Internação
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('historico.index') }}">
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

            <div class="container">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mt-4">Usuários</h2>
                    <div class="d-flex gap-2">
                        <a class="btn btn-primary mt-4" href="{{ route('usuario.create') }}">Novo Usuário</a>
                    </div>
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

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Telefone</th>
                            <th>Data de Cadastro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->nome }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @if ($usuario->tipo == 'gestor')
                                        <span class="badge bg-success">Gestor(a)</span>
                                    @elseif ($usuario->tipo == 'enfermeiro')
                                        <span class="badge bg-danger">Enfermeiro(a)</span>
                                    @elseif ($usuario->tipo == 'recepcionista')
                                        <span class="badge bg-info">Recepcionista</span>
                                    @elseif ($usuario->tipo == 'auxiliar_enfermagem')
                                        <span class="badge bg-warning">Auxiliar de Enfermagem</span>
                                    @elseif ($usuario->tipo == 'manutencao')
                                        <span class="badge bg-secondary">Manutenção</span>
                                    @elseif ($usuario->tipo == 'medico')
                                        <span class="badge bg-light text-dark">Médico</span>
                                    @elseif ($usuario->tipo == 'higienizacao')
                                        <span class="badge bg-primary">Higienização</span>
                                    @endif
                                </td>
                                <td>{{ $usuario->status }}</td>
                                <td>{{ $usuario->telefone }}</td>
                                <td>{{ \Carbon\Carbon::parse($usuario->data_cadastro)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('usuario.edit', ['id' => $usuario->id]) }}"
                                        class="btn btn-primary btn-sm">Editar</a>

                                    <button class="btn btn-danger btn-sm" wire:click="delete ({{ $usuario->id }})"
                                        wire:confirm="Deseja excluir a tarefa?">Excluir</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
