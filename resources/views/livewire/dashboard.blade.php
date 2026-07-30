<div>
    <div class="flex-grow-1 p-4 overflow-y-auto" wire:poll.3s>

        <!-- 1. CABEÇALHO INTERNO -->
        <div class="mb-4">
            <h3 class="fw-bold text-dark m-0">Dashboard</h3>
            <p class="text-muted small mt-1">Monitoramento em tempo real dos leitos hospitalares</p>
        </div>

        <!-- 2. CARDS SUPERIORES (INDICADORES) -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-3">
                <div class="card h-100 shadow-sm border-0 p-3">
                    <div class="d-flex justify-content-between align-items-start text-secondary">
                        <span class="text-uppercase small fw-bold">Total de Leitos</span>
                        <i class="bi bi-hospital fs-5 text-muted"></i>
                    </div>
                    <div class="mt-2">
                        <h3 class="fw-bold m-0 text-dark">{{ $totalLeitos }}</h3>
                        <p class="text-muted small m-0 mt-1">Em {{ $totalAlas }} alas</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card h-100 shadow-sm border-0 p-3">
                    <div class="d-flex justify-content-between align-items-start text-secondary">
                        <span class="text-uppercase small fw-bold">Taxa de Ocupação</span>
                        <i class="bi bi-percent fs-5 text-muted"></i>
                    </div>
                    <div class="mt-2">
                        <h3 class="fw-bold m-0 text-dark">{{ $taxaOcupacao }}%</h3>
                        <p class="text-muted small m-0 mt-1">{{ $leitosOcupados }} ocupados</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card h-100 shadow-sm border-0 p-3">
                    <div class="d-flex justify-content-between align-items-start text-secondary">
                        <span class="text-uppercase small fw-bold">Leitos Disponíveis</span>
                        <i class="bi bi-check-circle fs-5 text-muted"></i>
                    </div>
                    <div class="mt-2">
                        <h3 class="fw-bold m-0 text-dark">{{ $leitosDisponiveis }}</h3>
                        <p class="text-success small fw-medium m-0 mt-1">Prontos para uso</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card h-100 shadow-sm border-0 p-3">
                    <div class="d-flex justify-content-between align-items-start text-secondary">
                        <span class="text-uppercase small fw-bold">Pacientes Internados</span>
                        <i class="bi bi-person fs-5 text-muted"></i>
                    </div>
                    <div class="mt-2">
                        <h3 class="fw-bold m-0 text-dark">{{ $pacientesInternados }}</h3>
                        <p class="text-muted small m-0 mt-1">Ativos no sistema</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. SUB-CARDS DE FILTROS/STATUS RÁPIDOS -->
        <div class="row g-2 mb-4">
            <div class="col-6 col-md-2">
                <div class="p-2 rounded bg-success bg-opacity-10 border border-success border-opacity-25 text-success">
                    <span class="small fw-bold d-block">● Disponível</span>
                    <span class="fs-4 fw-bold mt-1 d-block">{{ $leitosDisponiveis }}</span>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="p-2 rounded bg-danger bg-opacity-10 border border-danger border-opacity-25 text-danger">
                    <span class="small fw-bold d-block">▲ Ocupado</span>
                    <span class="fs-4 fw-bold mt-1 d-block">{{ $leitosOcupados }}</span>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="p-2 rounded bg-warning bg-opacity-10 border border-warning border-opacity-25 text-warning">
                    <span class="small fw-bold d-block">🧽 Limpeza</span>
                    <span class="fs-4 fw-bold mt-1 d-block">0</span>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="p-2 rounded bg-info bg-opacity-10 border border-info border-opacity-25 text-info">
                    <span class="small fw-bold d-block">🛠 Manutenção</span>
                    <span class="fs-4 fw-bold mt-1 d-block">0</span>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="p-2 rounded bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary">
                    <span class="small fw-bold d-block">🚨 Emergência</span>
                    <span class="fs-4 fw-bold mt-1 d-block">0</span>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div
                    class="p-2 rounded bg-secondary bg-opacity-10 border border-secondary border-opacity-25 text-secondary">
                    <span class="small fw-bold d-block">📅 Reservado</span>
                    <span class="fs-4 fw-bold mt-1 d-block">0</span>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
