<div>
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mt-4">Quartos</h2>
            <div class="d-flex gap-2">
                <a class="btn btn-primary mt-4" href="{{ route('quarto.create') }}">Novo Quarto</a>
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
                    <th>Quarto</th>
                    <th>Total de Leitos</th>
                    <th>Leitos Cadastrados</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($quartos as $quarto)
                    <tr>
                        <td><b>{{ $quarto->id }}</b></td>
                        <td>{{ $quarto->alas->nome }}</td>
                        <td>{{ $quarto->quarto }}</td>
                        <td>{{ $quarto->total_leitos }}</td>
                        <td>{{ $quarto->leitos_cadastrados }}</td>
                        <td>{{ \Carbon\Carbon::parse($quarto->data_criacao)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('quarto.edit', ['id' => $quarto->id]) }}"
                                class="btn btn-sm btn-primary">Editar</a>
                            <button wire:click='delete({{ $quarto->id }})'
                                class="btn btn-sm btn-danger">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
