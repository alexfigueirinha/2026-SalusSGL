<div>
    <main class="flex-grow-1 d-flex justify-content-center align-items-center p-4">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form class="card p-4 shadow align-content-center" wire:submit.prevent="store">
                        <h3 class="d-flex align-items-center">
                            <i class="bi bi-door-open me-1 fs-3"></i>
                            Novo Leito
                        </h3>
                        <div class="mb-2 form-floating">
                            <input type="name" class="form-control" wire:model="leito" id="floatingInput" />
                            <label for="floatingInput">Número do Leito</label>
                        </div>
                        <select class="mb-2 form-select" wire:model="alas_id" aria-label="Default select example">
                            <option selected>Selecione a ala</option>
                            @foreach ($alas as $ala)
                                <option value="{{ $ala->id }}">{{ $ala->nome }}</option>
                            @endforeach
                        </select>
                        <select class="mb-2 form-select" wire:model="quartos_id" aria-label="Default select example">
                            <option selected>Selecione o quarto</option>
                            @foreach ($quartos as $quarto)
                                <option value="{{ $quarto->id }}">{{ $quarto->quarto }} -
                                    {{ $quarto->alas->nome }}</option>
                            @endforeach
                        </select>
                        <select class="mb-2 form-select" wire:model="atualizacao" aria-label="Default select example">
                            <option selected>Selecione o status inicial</option>
                            <option value="disponivel">Disponível</option>
                            <option value="ocupado">Ocupado</option>
                            <option value="reservado">Reservado</option>
                            <option value="emergencia">Emergência</option>
                            <option value="manutencao">Manutenção</option>
                            <option value="em_limpeza">Em Limpeza</option>
                        </select>
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
</div>
</div>
