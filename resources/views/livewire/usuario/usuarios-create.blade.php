<div>
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
                        <img src="./img/1000_F_339565997_c6qql4K23R6pgWrrxGHPgajx82kKudXN.jpg"
                            class="mx-auto mb-2 d-block" width="55" height="55">
                        <h1 class="h3 mb-3 text-center">Criar Conta</h1>
                        <div class="mb-2 form-floating">
                            <input type="name" class="form-control" wire:model="nome" id="floatingInput" />
                            <label for="floatingInput">Nome completo</label>
                        </div>
                        <div class="mb-2 form-floating">
                            <input type="email" class="form-control" wire:model="email" id="floatingInput" />
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="mb-2 form-floating">
                            <input type="tel" class="form-control" wire:model="telefone" id="telefone" />
                            <label for="floatingPhone">Telefone</label>
                        </div>
                        <select class="mb-2 form-select" wire:model="tipo" aria-label="Default select example">
                            <option selected>Selecione o tipo</option>
                            <option value="1">Recepcionista</option>
                            <option value="2">Enfermeiro</option>
                            <option value="3">Auxiliar de Enfermagem</option>
                            <option value="4">Higienização</option>
                            <option value="5">Gestor</option>
                            <option value="6">Manutenção</option>
                            <option value="7">Médico</option>
                        </select>
                        <div class="mb-2 form-floating">
                            <input type="password" class="form-control" wire:model="senha" id="floatingPassword" />
                            <label for="floatingPassword">Senha</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" class="form-control" wire:model="senha" id="floatingPassword" />
                            <label for="floatingPassword">Confirmar senha</label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Cadastrar
                        </button>
                        <p class="mt-3 text-center">Já possui uma conta? <a
                                class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                href="index.html">Faça Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>