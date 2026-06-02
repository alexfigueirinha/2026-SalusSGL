<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @livewireStyles
</head>

<body class="bg-light">

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
                    <a href="#" class="nav-link">
                        <i class="bi bi-hospital"></i>
                        Alas
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-door-open"></i>
                        Quartos
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-activity"></i>
                        Leitos
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-people-fill"></i>
                        Usuários
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-person-fill"></i>
                        Pacientes
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
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

        <!-- ÁREA PRINCIPAL -->
        <div class="flex-grow-1 d-flex justify-content-center align-items-center p-4">

            <!-- CARD -->
            <div class="card shadow border-0" style="width: 420px; border-radius: 12px;">

                <div class="card-body p-4">

                    <!-- TÍTULO -->
                    <h2 class="fw-bold mb-4">
                        <i class="bi bi-hospital text-dark"></i>
                        Novo Leito
                    </h2>

                    <!-- INPUT -->
                    <div class="mb-3">
                        <input type="text"
                            class="form-control form-control-lg"
                            placeholder="Número do Leito">
                    </div>

                    <!-- SELECT QUARTO -->
                    <div class="mb-3">
                        <select class="form-select form-select-lg">
                            <option selected disabled>
                                Selecione o quarto
                            </option>

                            <option>Quarto 101</option>
                            <option>Quarto 102</option>
                            <option>Quarto 103</option>
                        </select>
                    </div>

                    <!-- SELECT STATUS -->
                    <div class="mb-4">
                        <select class="form-select form-select-lg">
                            <option selected disabled>
                                Selecione o status inicial
                            </option>

                            <option>Disponível</option>
                            <option>Ocupado</option>
                            <option>Manutenção</option>
                        </select>
                    </div>

                    <!-- BOTÕES -->
                    <div class="d-flex justify-content-end gap-2">

                        <button class="btn btn-outline-primary px-4">
                            Cancelar
                        </button>

                        <button class="btn btn-primary px-4">
                            Criar
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>