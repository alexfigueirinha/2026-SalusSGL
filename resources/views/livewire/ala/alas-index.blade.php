<div class="mt-5">
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
                        <th>Descrição</th>
                        <th>Total de Quartos</th>
                        <th>Quartos Cadastrados</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($alas as $ala)
                        <tr>
                            <td>{{ $ala->id }}</td>
                            <td>{{ $ala->nome }}</td>
                            <td>{{ $ala->descricao }}</td>
                            <td> {{ $ala->total_quartos }}
                            <td>{{ $ala->quartos_cadastrados }}</td>
                            <td>{{ \Carbon\Carbon::parse($ala->data_criacao)->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('leito.edit', ['id' => $ala->id]) }}"
                                    class="btn btn-primary btn-sm">Editar</a>

                                <button class="btn btn-danger btn-sm"
                                    wire:click="excluir({{ $ala->id }})"
                                    wire:confirm="Deseja excluir o quarto?">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
