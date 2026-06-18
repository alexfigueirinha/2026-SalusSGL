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

            <!-- ÁREA CENTRAL -->
            <main class="flex-grow-1 p-4 overflow-y-auto bg-light d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row justify-content-center gap-4">

                        <!-- FORMULÁRIO DE CADASTRO -->
                        <div class="col-md-5 col-lg-4">
                            <form class="card p-4 shadow-sm border-0 bg-white" wire:submit.prevent="store">
                                <h3 class="d-flex align-items-center gap-2 mb-3 fs-5 font-bold text-dark">
                                    <i class="bi bi-plus-circle text-primary"></i> Novo Leito
                                </h3>

                                <div class="mb-2 form-floating">
                                    <input type="text" class="form-control" wire:model="leito" id="floatingInput"
                                        placeholder="Ex: 102 - B" required />
                                    <label for="floatingInput">Número do Leito</label>
                                    @error('leito')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <select class="form-select py-2.5 text-muted" style="font-size: 14px;"
                                        wire:model="alas_id" required>
                                        <option value="">Selecione a ala</option>
                                        @foreach ($alas as $ala)
                                            <option value="{{ $ala->id }}">{{ $ala->nome }}</option>
                                        @endforeach
                                    </select>
                                    @error('alas_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <select class="form-select py-2.5 text-muted" style="font-size: 14px;"
                                        wire:model="quartos_id" required>
                                        <option value="">Selecione o quarto</option>
                                        @foreach ($quartos as $quarto)
                                            <option value="{{ $quarto->id }}">{{ $quarto->quarto }} -
                                                {{ $quarto->alas->nome ?? 'Ala' }}</option>
                                        @endforeach
                                    </select>
                                    @error('quartos_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <select class="form-select py-2.5 text-muted" style="font-size: 14px;"
                                        wire:model="atualizacao" required>
                                        <option value="">Selecione o status inicial</option>
                                        <option value="Disponivel">Disponível</option>
                                        <option value="Ocupado">Ocupado</option>
                                        <option value="Reservado">Reservado</option>
                                        <option value="Emergencia">Emergência</option>
                                        <option value="Manutencao">Manutenção</option>
                                        <option value="Em Limpeza">Em Limpeza</option>
                                    </select>
                                    @error('atualizacao')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end gap-2 pt-2 border-t">
                                    <a href="{{ route('leito.index') }}" class="btn btn-outline-secondary px-3"
                                        style="font-size: 14px;">Voltar</a>
                                    <button class="btn btn-primary px-4" type="submit"
                                        style="font-size: 14px; font-weight: 600;">
                                        Criar Leito
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- FEEDBACK DO QR CODE GERADO EM TEMPO REAL -->
                        @if ($qrCodeUrlResult)
                            <div class="col-md-4">
                                <div class="card p-4 shadow-sm border-0 bg-white text-center d-flex flex-column align-items-center justify-content-center"
                                    id="printableQrCard">
                                    <h4 class="fs-6 fw-bold text-success mb-3"><i class="bi bi-check2-circle"></i>
                                        Código Gerado</h4>

                                    <!-- Imagem real gerada pronta para o Scanner ler -->
                                    <img src="{{ $qrCodeUrlResult }}" alt="QR Code"
                                        class="img-fluid border p-2 rounded bg-white shadow-sm mb-2"
                                        style="max-width: 180px;">

                                    <div class="mb-3">
                                        <span
                                            class="badge bg-light text-dark border font-monospace fs-6 px-3 py-1.5">{{ $codigoIdentificador }}</span>
                                        <small class="text-muted d-block mt-2" style="font-size: 11px;">Leito:
                                            {{ $leito }}</small>
                                    </div>

                                    <!-- Botão javascript nativo para impressão direta da etiqueta -->
                                    <button type="button" onclick="window.print()"
                                        class="btn btn-dark btn-sm w-100 fw-semibold shadow-sm">
                                        <i class="bi bi-printer me-1"></i> Imprimir Etiqueta
                                    </button>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
