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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form class="card p-4 shadow align-content-center" wire:submit.prevent='update'>
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
                        <option>{{ $quarto->quarto }}</option>
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
</div>