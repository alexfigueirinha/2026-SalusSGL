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

        <div class="mb-3">
            <input type="text" wire:model.live='search' placeholder="Pesquisar..." class="form-control">
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ala</th>
                    <th>Quarto</th>
                    <th>Leito</th>
                    <th>Paciente</th>
                    <th>Data e Hora de Entrada</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($internacaos as $internacao)
                    <tr>
<<<<<<< HEAD
                        <td>{{ $internacao->id }}</td>
                        <td>{{ $internacao->alas_id }}</td>
                        <td>{{ $internacao->quartos_id }}</td>
                        <td> {{ $internacao->leitos_id }}
                        <td>{{ $internacao->pacientes_id }}</td>
                        <td>{{ \Carbon\Carbon::parse($internacao->data_hora_entrada)->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('internacao.edit', ['id' => $internacao->id]) }}"
                                class="btn btn-primary btn-sm">Editar</a>

                            <button class="btn btn-danger btn-sm" wire:click="excluir({{ $internacao->id }})"
                                wire:confirm="Deseja excluir o quarto?">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
=======
                        <th>#</th>
                        <th>Paciente</th>
                        <th>Ala</th>
                        <th>Quarto</th>
                        <th>Leito</th>
                        <th>Data e Hora de Entrada</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($internacaos as $internacao)
                        <tr>
                            <td>{{ $internacao->id }}</td>
                            <td>{{ $internacao->pacientes->nome }}</td>
                            <td>{{ $internacao->alas_id }}</td>
                            <td>{{ $internacao->quartos_id }}</td>
                            <td>{{ $internacao->leitos_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($internacao->data_hora_entrada)->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('internacao.edit', ['id' => $internacao->id]) }}"
                                    class="btn btn-primary btn-sm">Editar</a>

                                <button class="btn btn-danger btn-sm"
                                    wire:click="excluir({{ $internacao->id }})"
                                    wire:confirm="Deseja excluir o quarto?">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
>>>>>>> e18a56413ba2e257a9d1ebb7dce529a2213c5f25
    </div>
</div>
