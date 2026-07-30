<div>
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
            <h2 class="mt-4">Pacientes</h2>
            <div class="d-flex gap-2">
                <a class="btn btn-primary mt-4" href="{{ route('paciente.create') }}">Novo Paciente</a>
            </div>
        </div>

        <div class="mb-3">
            <input type="text" wire:model.live='search' placeholder="Pesquisar..." class="form-control">
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Telefone</th>
                    <th>Data de Entrada</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->id }}</td>
                        <td>{{ $paciente->nome }}</td>
                        <td>{{ $paciente->cpf }}</td>
                        <td>{{ $paciente->data_nascimento }}</td>
                        <td>{{ $paciente->telefone }}</td>
                        <td>{{ \Carbon\Carbon::parse($paciente->data_hora)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('paciente.edit', ['id' => $paciente->id]) }}"
                                class="btn btn-primary btn-sm">Editar</a>

                            <button class="btn btn-danger btn-sm" wire:click="delete ({{ $paciente->id }})"
                                wire:confirm="Deseja excluir a tarefa?">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
