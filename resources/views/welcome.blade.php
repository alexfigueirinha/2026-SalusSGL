<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @livewireStyles
</head>

<body>
    @livewireScripts

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="bi bi-heart-pulse fs-4"></i> SalusSGL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#recursos">Recursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#como-funciona">Como Funciona</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item ms-2">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-primary rounded-pill">
                                <i class="bi bi-grid-1x2-fill"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill">
                                <i class="bi bi-box-arrow-in-right"></i> Entrar
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Espaço para navbar fixa -->
    <div style="height: 70px;"></div>

    <!-- Hero -->
    <div class="bg-primary text-white py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-3">
                        Gestão Inteligente de Leitos Hospitalares
                    </h1>
                    <p class="lead mb-4">
                        Otimize a ocupação, reduza o tempo de espera e melhore a experiência dos pacientes com
                        monitoramento em tempo real.
                    </p>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg rounded-pill text-primary fw-bold">
                            <i class="bi bi-speedometer2"></i> Acessar Sistema
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light btn-lg rounded-pill text-primary fw-bold">
                            <i class="bi bi-box-arrow-in-right"></i> Começar Agora
                        </a>
                    @endauth
                </div>
                <div class="col-lg-6 text-center">
                    <i class="bi bi-hospital text-white" style="font-size: 15rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recursos -->
    <div id="recursos" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Recursos Principais</h2>
                <p class="text-muted">Tudo que você precisa para uma gestão eficiente</p>
            </div>

            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary bg-gradient rounded-3 d-inline-flex p-3 mb-3">
                                <i class="bi bi-display text-white fs-3"></i>
                            </div>
                            <h5 class="card-title fw-bold">Tempo Real</h5>
                            <p class="card-text text-muted">Acompanhe o status de cada leito instantaneamente.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-info bg-gradient rounded-3 d-inline-flex p-3 mb-3">
                                <i class="bi bi-qr-code text-white fs-3"></i>
                            </div>
                            <h5 class="card-title fw-bold">QR Code</h5>
                            <p class="card-text text-muted">Atualize status escaneando códigos QR nos leitos.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-success bg-gradient rounded-3 d-inline-flex p-3 mb-3">
                                <i class="bi bi-bell text-white fs-3"></i>
                            </div>
                            <h5 class="card-title fw-bold">Notificações</h5>
                            <p class="card-text text-muted">Alertas automáticos para equipes sobre mudanças.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-warning bg-gradient rounded-3 d-inline-flex p-3 mb-3">
                                <i class="bi bi-clock-history text-white fs-3"></i>
                            </div>
                            <h5 class="card-title fw-bold">Histórico</h5>
                            <p class="card-text text-muted">Registro completo de todas as movimentações.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Como Funciona -->
    <div id="como-funciona" class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Como Funciona</h2>
                <p class="text-muted">Simples, rápido e eficiente</p>
            </div>

            <div class="row g-4 text-center">
                <div class="col-md-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <span class="fs-4 fw-bold">1</span>
                    </div>
                    <h5 class="fw-bold">Cadastre</h5>
                    <p class="text-muted">Configure alas, quartos e leitos no sistema.</p>
                </div>
                <div class="col-md-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <span class="fs-4 fw-bold">2</span>
                    </div>
                    <h5 class="fw-bold">Monitore</h5>
                    <p class="text-muted">Acompanhe a ocupação pelo dashboard.</p>
                </div>
                <div class="col-md-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <span class="fs-4 fw-bold">3</span>
                    </div>
                    <h5 class="fw-bold">Atualize</h5>
                    <p class="text-muted">Use QR Code ou sistema para mudar status.</p>
                </div>
                <div class="col-md-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <span class="fs-4 fw-bold">4</span>
                    </div>
                    <h5 class="fw-bold">Receba Alertas</h5>
                    <p class="text-muted">Equipes são notificadas automaticamente.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sobre -->
    <div id="sobre" class="py-5 bg-light">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                    <i class="bi bi-heart-pulse text-primary" style="font-size: 15rem; opacity: 0.3;"></i>
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Sobre o SalusSGL</h2>
                    <p class="lead mb-3">
                        O <strong>SalusSGL</strong> nasceu para otimizar a gestão de leitos hospitalares.
                    </p>
                    <p class="mb-4">
                        Solução completa para hospitais que buscam excelência operacional,
                        combinando tecnologia com interface intuitiva.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <span class="badge bg-success fs-6">
                            <i class="bi bi-check-circle"></i> Monitoramento 24/7
                        </span>
                        <span class="badge bg-success fs-6">
                            <i class="bi bi-check-circle"></i> Interface Intuitiva
                        </span>
                        <span class="badge bg-success fs-6">
                            <i class="bi bi-check-circle"></i> Segurança de Dados
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-primary text-white py-5">
        <div class="container text-center py-4">
            <h2 class="fw-bold mb-3">Pronto para transformar a gestão do seu hospital?</h2>
            <p class="lead mb-4">Junte-se a hospitais que já otimizam recursos com o SalusSGL</p>
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg rounded-pill text-primary fw-bold">
                    <i class="bi bi-speedometer2"></i> Ir para Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-light btn-lg rounded-pill text-primary fw-bold">
                    <i class="bi bi-box-arrow-in-right"></i> Acessar Sistema
                </a>
            @endauth
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h5><i class="bi bi-heart-pulse"></i> SalusSGL</h5>
                    <p class="text-secondary mb-0">Sistema de Gestão de Leitos Hospitalares</p>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <h6>Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#recursos" class="text-secondary text-decoration-none">Recursos</a></li>
                        <li><a href="#como-funciona" class="text-secondary text-decoration-none">Como Funciona</a>
                        </li>
                        <li><a href="#sobre" class="text-secondary text-decoration-none">Sobre</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Contato</h6>
                    <ul class="list-unstyled text-secondary">
                        <li><i class="bi bi-envelope"></i> contato@salussgl.com</li>
                        <li><i class="bi bi-telephone"></i> (11) 1234-5678</li>
                    </ul>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="text-center text-secondary">
                <small>&copy; 2024 SalusSGL. Todos os direitos reservados.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
