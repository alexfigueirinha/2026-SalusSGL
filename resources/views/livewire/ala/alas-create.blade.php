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

    <div class="d-flex flex-column vh-100">
        <!-- TOPO -->
        <div class="border-bottom p-3 bg-white shadow-sm">
            <h2 class="text-primary m-0">
                <i class="bi bi-heart-pulse"></i>
                SalusSGL
            </h2>
        </div>
        <!-- CONTEÚDO -->
        <div class="d-flex flex-grow-1">
            <!-- SIDEBAR -->
            <div class="p-3 border-end bg-white shadow-sm" style="width: 250px;">
                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="bi bi-grid-1x2-fill"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ala.index') }}" class="nav-link">
                            <i class="bi bi-hospital"></i>
                            Alas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('quarto.index') }}" class="nav-link">
                            <i class="bi bi-door-open"></i>
                            Quartos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('leito.index') }}" class="nav-link">
                            <i class="bi bi-activity"></i>
                            Leitos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('usuario.index') }}" class="nav-link">
                            <i class="bi bi-people-fill"></i>
                            Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('paciente.index') }}" class="nav-link">
                            <i class="bi bi-person-fill"></i>
                            Pacientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('movimentacao.leito.index') }}" class="nav-link">
                            <i class="bi bi-clipboard2-data"></i>
                            Histórico
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-qr-code"></i>
                            QR Code
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-gear"></i>
                            Configurações
                        </a>

                    </li>
                </ul>
            </div>

            <main class="flex-grow-1 d-flex justify-content-center align-items-center p-4">
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
                                    <input type="number" class="form-control" wire:model="total_quartos"
                                        id="totalQuartos" value="0" min="0" />
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
