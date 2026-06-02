<div>
    @php
        $meta = [
            'disponivel' => [
                'label' => 'Disponível',
                'icon' => 'bi-check-circle',
                'color' => '#198754',
                'bg' => '#e8f8ef',
                'border' => '#b6ebcd',
                'text' => '#0f5132',
            ],
            'ocupado' => [
                'label' => 'Ocupado',
                'icon' => 'bi-person',
                'color' => '#dc3545',
                'bg' => '#fdeaea',
                'border' => '#f5c2c2',
                'text' => '#842029',
            ],
            'em_limpeza' => [
                'label' => 'Em Limpeza',
                'icon' => 'bi-clock-history',
                'color' => '#b59000',
                'bg' => '#fcf6d8',
                'border' => '#f0e3a0',
                'text' => '#7a5c00',
            ],
            'manutencao' => [
                'label' => 'Manutenção',
                'icon' => 'bi-wrench',
                'color' => '#fd7e14',
                'bg' => '#fef0e0',
                'border' => '#f8cfa0',
                'text' => '#8a4b00',
            ],
            'emergencia' => [
                'label' => 'Emergência',
                'icon' => 'bi-exclamation-circle',
                'color' => '#6f42c1',
                'bg' => '#f4ecfc',
                'border' => '#dcc7f5',
                'text' => '#4d2d8a',
            ],
            'reservado' => [
                'label' => 'Reservado',
                'icon' => 'bi-bookmark-fill',
                'color' => '#0d6efd',
                'bg' => '#e7f1ff',
                'border' => '#b9d4fe',
                'text' => '#084298',
            ],
        ];

        $resumo = [
            ['key' => 'disponivel', 'count' => (int) ($statusCounts['disponivel'] ?? 0)],
            ['key' => 'ocupado', 'count' => (int) ($statusCounts['ocupado'] ?? 0)],
            ['key' => 'em_limpeza', 'count' => (int) ($statusCounts['em_limpeza'] ?? 0)],
            ['key' => 'manutencao', 'count' => (int) ($statusCounts['manutencao'] ?? 0)],
            ['key' => 'emergencia', 'count' => (int) ($statusCounts['emergencia'] ?? 0)],
            ['key' => 'reservado', 'count' => (int) ($statusCounts['reservado'] ?? 0)],
        ];
    @endphp

    <div>
        <div class="d-flex" style="min-height: 100vh;">

            <x-navbar active="dashboard" />

            <main class="flex-grow-1 p-4" style="overflow-y: auto;">

                <!-- CABEÇALHO -->
                <div class="mb-4">
                    <h1 class="fw-bold mb-1">Dashboard</h1>
                    <p class="text-muted m-0">Monitoramento em tempo real dos leitos hospitalares</p>
                </div>

                <!-- CARDS DE RESUMO -->
                <div class="row g-3 mb-3">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="text-muted">Total de Leitos</span>
                                    <i class="bi bi-hospital text-secondary fs-5"></i>
                                </div>
                                <div class="fs-2 fw-bold mt-2">{{ $totalLeitos }}</div>
                                <div class="small text-muted">Em {{ $totalAlas }}
                                    {{ $totalAlas == 1 ? 'ala' : 'alas' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="text-muted">Taxa de Ocupação</span>
                                    <i class="bi bi-people text-secondary fs-5"></i>
                                </div>
                                <div class="fs-2 fw-bold mt-2">{{ $taxaOcupacao }}%</div>
                                <div class="small text-muted">{{ $ocupados }}
                                    {{ $ocupados == 1 ? 'leito ocupado' : 'leitos ocupados' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="text-muted">Leitos Disponíveis</span>
                                    <i class="bi bi-check-circle text-success fs-5"></i>
                                </div>
                                <div class="fs-2 fw-bold mt-2 text-success">{{ $disponiveis }}</div>
                                <div class="small text-muted">Prontos para uso</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <span class="text-muted">Pacientes Internados</span>
                                    <i class="bi bi-person text-secondary fs-5"></i>
                                </div>
                                <div class="fs-2 fw-bold mt-2">{{ $pacientesInternados }}</div>
                                <div class="small text-muted">Ativos no sistema</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RESUMO POR STATUS -->
                <div class="row g-3 mb-4">
                    @foreach ($resumo as $item)
                        @php $m = $meta[$item['key']]; @endphp
                        <div class="col-6 col-md-4 col-xl-2">
                            <div class="card border-0 shadow-sm h-100"
                                style="border-radius: 12px; background: {{ $m['bg'] }}; border: 1px solid {{ $m['border'] }} !important;">
                                <div class="card-body py-3">
                                    <div class="d-flex align-items-center gap-2 mb-1"
                                        style="color: {{ $m['color'] }};">
                                        <i class="bi {{ $m['icon'] }}"></i>
                                        <span class="fw-semibold">{{ $m['label'] }}</span>
                                    </div>
                                    <div class="fs-3 fw-bold" style="color: {{ $m['color'] }};">{{ $item['count'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- MONITORAMENTO EM TEMPO REAL -->
                <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-building text-dark"></i>
                            Monitoramento em Tempo Real - Todos os Leitos
                        </h5>

                        @forelse ($alas as $ala)
                            @php $leitosDaAla = $ala->quartos->flatMap->leitos; @endphp
                            <div class="border rounded-3 p-3 mb-3">
                                <h6 class="fw-bold mb-3 text-primary">
                                    <i class="bi bi-hospital"></i>
                                    {{ $ala->nome }}
                                </h6>

                                @if ($leitosDaAla->isEmpty())
                                    <p class="text-muted small m-0">Nenhum leito cadastrado nesta ala.</p>
                                @else
                                    <div class="row g-3">
                                        @foreach ($ala->quartos as $quarto)
                                            @foreach ($quarto->leitos as $leito)
                                                @php
                                                    $status = $leito->atualizacao ?? 'disponivel';
                                                    $m = $meta[$status] ?? $meta['disponivel'];
                                                    $internacao = $pacientesPorLeito[$leito->id] ?? null;
                                                    $pacienteNome = $internacao?->pacientes?->nome;
                                                @endphp
                                                <div class="col-12 col-md-6 col-xl-3">
                                                    <div class="h-100 p-3"
                                                        style="border-radius: 12px; background: {{ $m['bg'] }}; border: 1px solid {{ $m['border'] }};">
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <div>
                                                                <div class="fw-bold"
                                                                    style="color: {{ $m['text'] }};">
                                                                    {{ $quarto->quarto }}-{{ $leito->leito }}
                                                                </div>
                                                                <div class="small"
                                                                    style="color: {{ $m['text'] }}; opacity: .75;">
                                                                    Quarto {{ $quarto->quarto }}
                                                                </div>
                                                            </div>
                                                            <i class="bi {{ $m['icon'] }}"
                                                                style="color: {{ $m['color'] }};"></i>
                                                        </div>

                                                        <span class="badge rounded-pill mt-2"
                                                            style="background: transparent; border: 1px solid {{ $m['color'] }}; color: {{ $m['color'] }};">
                                                            {{ $m['label'] }}
                                                        </span>

                                                        @if ($pacienteNome)
                                                            <div class="small fw-semibold mt-2"
                                                                style="color: {{ $m['text'] }};">
                                                                Paciente: {{ $pacienteNome }}
                                                            </div>
                                                        @endif

                                                        <div class="small mt-1"
                                                            style="color: {{ $m['text'] }}; opacity: .7;">
                                                            Atualizado:
                                                            {{ $leito->updated_at?->format('H:i:s') ?? '--:--:--' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @empty
                            <p class="text-muted m-0">Nenhuma ala cadastrada. Cadastre alas, quartos e leitos para
                                visualizar o monitoramento.</p>
                        @endforelse
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>
