<div class ="md-5">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" airia-label="close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Telefone</th>
                        <th>Leito Atual</th>
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
                            <td>{{ $paciente->leito_atual }}</td>
                            <td>{{ $paciente->data_entrada }}</td>
                            <td>{{ \Carbon\Carbon::parse($t->data_hora)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('pacientes.edit', ['id' => $paciente->id]) }}"
                                    class="btn btn-primary btn-sm">Editar</a>

                                <button class="btn btn-danger btn-sm"
                                    wire:click = "excluir ({{$paciente->id}})"
                                    wire:confirm="Deseja excluir a tarefa?">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
 
</div>
