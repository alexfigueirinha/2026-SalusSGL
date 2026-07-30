<div>
    <div class="d-flex flex-column vh-100">
        <!-- TOPO -->
        <div class="border-bottom p-3 bg-white shadow-sm d-flex justify-content-between align-items-center">
            <h2 class="text-primary m-0">
                <i class="bi bi-heart-pulse"></i>
                SalusSGL
            </h2>

            @auth
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark"
                        id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 me-2 text-secondary"></i>

                        <div class="d-none d-md-flex flex-column text-start me-2">
                            <strong class="lh-1">{{ auth()->user()->name }}</strong>
                            <small class="text-muted" style="font-size: 0.75rem;">
                                {{ auth()->user()->tipo ?? 'Sem Cargo' }}
                            </small>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person me-2"></i> Meu Perfil
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                </a>
            @endauth
        </div>
        <!-- CONTEÚDO -->
        <div class="d-flex flex-grow-1">
            <!-- SIDEBAR -->
            <div class="p-3 border-end bg-white shadow-sm" style="width: 250px;">
                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link active">
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
                        <a href="{{ route('internacao.index') }}" class="nav-link">
                            <i class="bi bi-clipboard2-data"></i>
                            Internação
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('movimentacaoLeito.index') }}" class="nav-link">
                            <i class="bi bi-clock-history"></i>
                            Histórico
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('qrCode') }}" class="nav-link">
                            <i class="bi bi-qr-code"></i>
                            QR Code
                        </a>
                    </li>
                    
                </ul>
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
                        Editar Leito
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
                            <option value="{{ $quarto->id }}">{{ $quarto->quarto }} - {{ $quarto->alas->nome }}</option>
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
