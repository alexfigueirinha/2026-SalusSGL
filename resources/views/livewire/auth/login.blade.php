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
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
