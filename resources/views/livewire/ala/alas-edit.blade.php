<div>

    <main class="flex-grow-1 d-flex justify-content-center align-items-center p-4">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form class="card p-4 shadow align-content-center" wire:submit.prevent="update">
                        <h2 class="d-flex align-items-center">
                            <i class="bi bi-clipboard2-pulse me-1 fs-3"></i>
                            Editar Ala
                        </h2>
                        <div class="mb-2 form-floating">
                            <input type="name" class="form-control" wire:model="nome" id="floatingInput" />
                            <label for="floatingInput">Nome da ala</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="mb-2 form-control" wire:model="descricao" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Descrição</label>
                        </div>
                        <div class="mb-2 form-floating">
                            <input type="number" class="form-control" wire:model="total_quartos" id="totalQuartos" />
                            <label for="totalQuartos">Total de Quartos</label>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="button" class="btn btn-outline-primary">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>