<div>
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

    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form class="card p-4 shadow align-content-center" wire:submit.prevent="store">
                        <h3 class="d-flex align-items-center">
                            <i class="bi bi-person-fill-add me-1 fs-3"></i>
                            Novo Paciente
                        </h3>
                        <div class="mb-2 form-floating">
                            <input type="name" class="form-control" wire:model="nome" id="floatingInput" />
                            <label for="floatingInput">Nome do Paciente</label>
                        </div>
                        <div class="mb-2 form-floating">
                            <input type="date" class="form-control" wire:model="data_nascimento" id="dataNascimento" />
                            <label for="dataNascimento">Data de Nascimento</label>
                        </div>
                        <div class="mb-2 form-floating">
                            <input type="tel" class="form-control" id="telefone" />
                            <label for="floatingPhone">Telefone</label>
                        </div>

                        <div class="mb-2 form-floating">
                            <input type="tel" class="form-control" wire:model="cpf" id="cpf" />
                            <label for="floatingPhone">CPF</label>
                        </div>

                        <select class="mb-2 form-select" wire:model="leito_atual" aria-label="Default select example">
                            <option selected>Selecione o leito</option>
                            @foreach ($leitos as $leito)
                            <option>{{ $leito->id }} {{ $leito->nome }}</option>
                            @endforeach

                        </select>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="button" class="btn btn-outline-primary">Cancelar</button>
                            <button class="btn btn-primary" type="submit">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>