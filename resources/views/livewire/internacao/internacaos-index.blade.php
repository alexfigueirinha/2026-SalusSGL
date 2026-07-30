<div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mt-4">Internações</h2>
            <div class="d-flex gap-2">
                <a class="btn btn-primary mt-4" href="{{ route('internacao.create') }}">Registrar Internação</a>
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
                        <td>{{ $internacao->alas_id }} - {{ $internacao->alas->nome }}</td>
                        <td>{{ $internacao->quartos_id }} - {{ $internacao->quartos->quarto }}</td>
                        <td>{{ $internacao->leitos_id }} - {{ $internacao->leitos->leito }}</td>
                        <td>{{ \Carbon\Carbon::parse($internacao->data_hora_entrada)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('internacao.edit', ['id' => $internacao->id]) }}"
                                class="btn btn-primary btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm" wire:click="delete({{ $internacao->id }})"
                                wire:confirm="Deseja excluir o quarto?">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
