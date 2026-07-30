<div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mt-4">Alas</h2>
            <div class="d-flex gap-2">
                <a class="btn btn-primary mt-4" href="{{ route('ala.create') }}">Nova Ala</a>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-3">
            <input type="text" wire:model.live='search' placeholder="Pesquisar..." class="form-control">
        </div>

        <table class="table table-hover">
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
                        <td>{{ $ala->total_quartos }}</td>
                        <td>{{ $ala->quartos_cadastrados }}</td>
                        <td>{{ \Carbon\Carbon::parse($ala->data_criacao)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('ala.edit', ['id' => $ala->id]) }}"
                                class="btn btn-sm btn-primary">Editar</a>

                            <button wire:click='delete({{ $ala->id }})'
                                class="btn btn-sm btn-danger">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
