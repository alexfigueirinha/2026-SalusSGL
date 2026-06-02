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
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mt-4">Internações</h2>
                </div>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <form class="card p-4 shadow align-content-center" wire:submit.prevent="store">
                                <h3 class="d-flex align-items-center">
                                    <i class="bi bi-door-open me-1 fs-3"></i>
                                    Registrar Internação
                                </h3>
                                <select class="mb-2 form-select" aria-label="Default select example">
                                    <option selected>Selecione o paciente</option>
                                    @foreach ($pacientes as $paciente)
                                        <option>{{ $paciente->nome }}</option>
                                    @endforeach
                                </select>
                                <select class="mb-2 form-select" aria-label="Default select example">
                                    <option selected>Selecione a ala</option>
                                    @foreach ($alas as $ala)
                                        <option>{{ $ala->nome }}</option>
                                    @endforeach
                                </select>
                                <select class="mb-2 form-select" aria-label="Default select example">
                                    <option selected>Selecione o quarto</option>
                                    @foreach ($quartos as $quarto)
                                        <option>{{ $quarto->quarto }}</option>
                                    @endforeach
                                </select>
                                <select class="mb-2 form-select" aria-label="Default select example">
                                    <option selected>Selecione o leito</option>
                                    @foreach ($leitos as $leito)
                                        <option>{{ $leito->leito }}</option>
                                    @endforeach
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
