<div>
    <main class="flex-grow-1 d-flex justify-content-center align-items-center p-4">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form class="card p-4 shadow align-content-center" wire:submit.prevent="store">
                        <h3 class="d-flex align-items-center">
                            <i class="bi bi-door-open me-1 fs-3"></i>
                            Registrar Internação
                        </h3>
                        <select class="mb-2 form-select" wire:model='pacientes_id' aria-label="Default select example">
                            <option selected>Selecione o paciente</option>
                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                            @endforeach
                        </select>
                        <select class="mb-2 form-select" wire:model='alas_id' aria-label="Default select example">
                            <option selected>Selecione a ala</option>
                            @foreach ($alas as $ala)
                                <option value="{{ $ala->id }}">{{ $ala->nome }}</option>
                            @endforeach
                        </select>
                        <select class="mb-2 form-select" wire:model='quartos_id' aria-label="Default select example">
                            <option selected>Selecione o quarto</option>
                            @foreach ($quartos as $quarto)
                                <option value="{{ $quarto->id }}">{{ $quarto->quarto }}</option>
                            @endforeach
                        </select>
                        <select class="mb-2 form-select" wire:model='leitos_id' aria-label="Default select example">
                            <option selected>Selecione o leito</option>
                            @foreach ($leitos as $leito)
                                <option value="{{ $leito->id }}">{{ $leito->leito }}</option>
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

@if ($leitos_id != $internacao_original_leito_id)
    <div class="row border p-3 mb-3 bg-light rounded animate__animated animate__fadeIn">
        <p class="text-warning fw-bold">⚠️ Atenção: Você está alterando o leito. Preencha os dados da
            movimentação:</p>
        <div class="col-md-6 mb-3">
            <label>Motivo da Movimentação</label>
            <input type="text" class="form-control" wire:model="motivo">
        </div>
        <div class="col-md-6 mb-3">
            <label>Solicitado Por</label>
            <input type="text" class="form-control" wire:model="solicitado_por">
        </div>
    </div>
@endif
