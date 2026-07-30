<div>
    <main class="flex-grow-1 d-flex flex-column p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mt-4">Internações</h2>
        </div>

        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="card p-4 shadow" wire:submit.prevent="update">
                        <h3 class="d-flex align-items-center mb-4">
                            <i class="bi bi-pencil-square me-2 fs-3 text-primary"></i>
                            Editar Internação
                        </h3>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Paciente</label>
                            <select class="form-select" wire:model='pacientes_id'>
                                <option value="">Selecione o paciente</option>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Ala</label>
                            <select class="form-select" wire:model.live='alas_id'>
                                <option value="">Selecione a ala</option>
                                @foreach ($alas as $ala)
                                    <option value="{{ $ala->id }}">{{ $ala->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Quarto</label>
                            <select class="form-select" wire:model.live='quartos_id'>
                                <option value="">Selecione o quarto</option>
                                @foreach ($quartos as $quarto)
                                    <option value="{{ $quarto->id }}">{{ $quarto->quarto }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Leito</label>
                            <select class="form-select" wire:model.live='leitos_id'>
                                <option value="">Selecione o leito</option>
                                @foreach ($leitos as $leito)
                                    <option value="{{ $leito->id }}">{{ $leito->leito }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if (
                            $alas_id != $internacao_original_ala_id ||
                                $quartos_id != $internacao_original_quarto_id ||
                                $leitos_id != $internacao_original_leito_id)
                            <div
                                class="p-3 my-3 bg-light border border-warning rounded animate__animated animate__fadeIn">
                                <p class="text-warning fw-bold mb-2">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    Movimentação detectada (Ala, Quarto ou Leito). Preencha os dados do
                                    histórico:
                                </p>

                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label class="small fw-bold">Motivo da Movimentação</label>
                                        <input type="text" class="form-control form-control-sm" wire:model="motivo"
                                            placeholder="Ex: Mudança de quadro clínico">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="small fw-bold">Solicitado Por</label>
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model="solicitado_por" placeholder="Ex: Enf. Mara">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <label class="small fw-bold">Observações</label>
                                        <textarea class="form-control form-control-sm" wire:model="observacoes" rows="2"
                                            placeholder="Notas adicionais se houver..."></textarea>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <a href="{{ route('internacao.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button class="btn btn-primary" type="submit">
                                Concluir Edição
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
