<div>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form class="card p-4 shadow align-content-center" wire:submit.prevent="store">
                        <h2 class="d-flex align-items-center">
                            <i class="bi bi-clipboard2-pulse me-1 fs-3"></i>
                            Nova Ala
                        </h2>
                        <div class="mb-2 form-floating">
                            <input type="name" class="form-control" wire:model="nome" id="floatingInput" />
                            <label for="floatingInput">Nome da Ala</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="mb-2 form-control" wire:model="descricao" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Descrição</label>
                        </div>
                        <div class="mb-2 form-floating">
                            <input type="number" class="form-control" wire:model="total_quartos" id="totalQuartos" value="0" min="0" />
                            <label for="totalQuartos">Total de Quartos</label>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="button" class="btn btn-outline-primary">Cancelar</button>
                            <button class="btn btn-primary" type="submit">
                                Criar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
