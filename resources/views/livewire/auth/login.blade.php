<div>

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

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
                            <form class="card p-4 shadow align-content-center" wire:submit.prevent='login'>
                                <h2 class="d-flex align-items-center">
                                    <i class="bi bi-person-fill me-1 fs-3"></i>
                                    Login
                                </h2>
                                <div class="mb-2 form-floating">
                                    <input type="email" class="form-control" wire:model='email' id="email" />
                                    <label for="floatingInput">Email</label>
                                    @error('email')
                                        <span class="text-danger small"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-floating">
                                    <input type="password" class="form-control" wire:model='password' id="password" />
                                    <label for="floatingPassword">Senha</label>
                                    @error('senha')
                                        <span class="text-danger small"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <p class="mb-4"><a
                                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                        href="">Esqueceu a senha?</a></p>
                                <button type="submit" class="btn btn-primary w-100 py-2">Entrar</button>
                                <p class="mt-3 text-center">Não tem uma conta? <a
                                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                        href="{{ route('dashboard') }}">Cadastre-se</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
