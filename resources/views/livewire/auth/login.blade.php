<div>

  @if(session()->has('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

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
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle" />
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="">Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <main>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <form class="card p-4 shadow align-content-center" wire:model.prevent='login'>
            <h2 class="d-flex align-items-center">
              <i class="bi bi-person-fill me-1 fs-3"></i>
              Login
            </h2>
            <div class="mb-2 form-floating">
              <input type="email" class="form-control" id="floatingInput" />
              <label for="floatingInput">Email</label>
              @error('email')
              <span class="text-danger small"> {{ $message }} </span>
              @enderror
            </div>
            <div class="mb-1 form-floating">
              <input type="password" class="form-control" id="floatingPassword" />
              <label for="floatingPassword">Senha</label>
              @error('password')
              <span class="text-danger small"> {{ $message }} </span>
              @enderror
            </div>
            <p class="mb-4"><a
                class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="recSenha.html">Esqueceu a senha?</a></p>
            <button class="btn btn-primary w-100 py-2" href="{{ route('ala.index') }}">
              Entrar
            </button>
            <p class="mt-3 text-center">Não tem uma conta? <a
                class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="">Cadastre-se</a></p>
          </form>
        </div>
      </div>
    </div>
  </main>
</div>