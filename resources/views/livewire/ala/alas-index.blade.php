<div>
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



    <div class="b-example-divider"></div>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <i class="bi bi-heart-pulse me-2 fs-2"></i>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <h3 class="text-primary bold">SalusSGL</h3>
                    </li>
                </ul>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle" />
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

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

<div class="mt-5">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif

    <div class="container">

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
                    <td> {{ $ala->total_quartos }}
                    <td>{{ $ala->quartos_cadastrados }}</td>

                    <td>{{ \Carbon\Carbon::parse($ala->data_criacao)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('ala.edit', ['id' => $ala->id]) }}">

                    <td>{{ \Carbon\Carbon::parse($ala->data_criacao)->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('leito.edit', ['id' => $ala->id]) }}">


                    <td>{{ \Carbon\Carbon::parse($ala->data_criacao)->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('leito.edit', ['id' => $ala->id]) }}">

                            class="btn btn-primary btn-sm">Editar</a>

                        <button class="btn btn-danger btn-sm" wire:click="excluir({{ $ala->id }})"
                            wire:confirm="Deseja excluir o quarto?">Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>