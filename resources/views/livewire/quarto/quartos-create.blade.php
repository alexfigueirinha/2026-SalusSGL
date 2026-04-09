<div>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form class="card p-4 shadow align-content-center" wire:submit.prevent="store">
                        <h3 class="d-flex align-items-center">
                            <i class="bi bi-door-open me-1 fs-3"></i>
                            Novo Quarto
                        </h3>
                        <div class="mb-2 form-floating">
                            <input type="name" class="form-control" wire:model="quarto" id="floatingInput" />
                            <label for="floatingInput">Número do Quarto</label>
                        </div>
                        <select class="mb-2 form-select" wire:model="alas_id" aria-label="Default select example">
                            <option selected>Selecione a ala</option>
                            @foreach ($alas as $ala)
                            <option value=" {{$ala->id }}">{{ $ala->nome }}</option>
                            @endforeach
                        </select>
                        <div class="mb-2 form-floating">
                            <input type="number" class="form-control" wire:model="total_leitos" id="totalQuartos" value="0" min="0" />
                            <label for="totalQuartos">Total de Leitos</label>
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
