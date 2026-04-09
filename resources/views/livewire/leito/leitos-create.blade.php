<div>
   <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form class="card p-4 shadow align-content-center">
                        <h3 class="d-flex align-items-center">
                            <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" width="35" height="35">
                                <path
                                    d="M328 436h800q83 0 141.5 58.5T1328 636v200h-100q0-41-29.5-70.5T1128 736H878q-41 0-70.5 29.5T778 836H678q0-41-29.5-70.5T578 736H328q-41 0-70.5 29.5T228 836H128V636q0-83 58.5-141.5T328 436zM228 936h1000q41 0 70.5 29.5t29.5 70.5v300H128v-300q0-41 29.5-70.5T228 936zm200 500v50q0 21-14.5 35.5T378 1536H278q-21 0-35.5-14.5T228 1486v-50h200zm800 0v50q0 21-14.5 35.5T1178 1536h-100q-21 0-35.5-14.5T1028 1486v-50h200z" />
                            </svg>
                            Novo Leito
                        </h3>
                        <div class="mb-2 form-floating">
                            <input type="name" class="form-control" wire:model="leito" id="floatingInput" />
                            <label for="floatingInput">Número do Leito</label>
                        </div>
                        <select class="mb-2 form-select" wire:model="quartos_id" aria-label="Default select example">
                            <option selected>Selecione o quarto</option>
                            @foreach ($quartos as $quarto)
                            <option>{{ $quarto->id }} {{ $quarto->nome }}</option>
                            @endforeach
                        </select>
                        <select class="mb-2 form-select" wire:model="atualizacao" aria-label="Default select example">
                            <option selected>Selecione o status inicial</option>
                            <option value="1">Disponível</option>
                            <option value="2">Ocupado</option>
                            <option value="3">Reservado</option>
                            <option value="4">Emergência</option>
                            <option value="5">Manutenção</option>
                            <option value="6">Em Limpeza</option>
                        </select>
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
