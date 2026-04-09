<div>
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
                            <input type="date" class="form-control"
                                wire:model="data_nascimento"id="dataNascimento" />
                            <label for="dataNascimento">Data de Nascimento</label>
                        </div>
                        <div class="mb-2 form-floating">
                            <input type="tel" class="form-control" id="telefone" />
                            <label for="floatingPhone">Telefone</label>
                        </div>

                        <div class="mb-2 form-floating">
                            <input type="tel" class="form-control" wire:model = "cpf" id="cpf" />
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
