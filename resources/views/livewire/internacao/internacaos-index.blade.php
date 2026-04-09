<div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ala</th>
                        <th>Quarto</th>
                        <th>Leito</th>
                        <th>Paciente</th>
                        <th>Data e Hora de Entrada</th>
                        <th>Data e Hora de Saída<th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($internacaos as $internacao)
                        <tr>
                            <td>{{ $internacao->id }}</td>
                            <td>{{ $internacao->alas_id }}</td>
                            <td>{{ $internacao->quartos_id }}</td>
                            <td> {{ $internacao->leitos_id }}
                            <td>{{ $internacao->pacientes_id }}</td>
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
    </div>
</div>
