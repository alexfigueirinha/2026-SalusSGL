<div class  ="md-5">
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
                        <th>Email</th>
                        <th>Tipo</th>
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
                            <td>{{ $usuario->tipo}}</td>
                            <td>{{ $usuario->telefone }}</td>
                            <td>{{ $usuario->data_cadastro }}</td>
                            <td>{{ \Carbon\Carbon::parse($t->data_hora)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('usuarios.edit', ['id' => $usuario->id]) }}"
                                    class="btn btn-primary btn-sm">Editar</a>

                                <button class="btn btn-danger btn-sm"
                                    wire:click = "excluir ({{$usuario->id}})"
                                    wire:confirm="Deseja excluir a tarefa?">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
