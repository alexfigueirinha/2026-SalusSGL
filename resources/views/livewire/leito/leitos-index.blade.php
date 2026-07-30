<div>
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mt-4">Leitos</h2>
            <div class="d-flex gap-2">
                <a class="btn btn-primary mt-4" href="{{ route('leito.create') }}">Novo Leito</a>
            </div>
        </div>

        <div class="mb-3">
            <input type="text" wire:model.live='search' placeholder="Pesquisar..." class="form-control">
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ala</th>
                    <th>Quarto</th>
                    <th>Leito</th>
                    <th>QR Code</th>
                    <th>Status</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($leitos as $leito)
                    <tr>
                        <td>{{ $leito->id }}</td>
                        <td>{{ $leito->alas->nome }}</td>
                        <td>{{ $leito->quartos->quarto }}</td>
                        <td>{{ $leito->leito }}</td>
                        <td>
                            @if (!empty($leito->codigo_qr))
                                <div
                                    style="background: white; padding: 4px; display: inline-block; border: 1px solid #dee2e6; border-radius: 6px;">
                                    <img src="https://chart.googleapis.com/chart?chs=70x70&cht=qr&chl={{ urlencode($leito->codigo_qr) }}&choe=UTF-8"
                                        alt="QR Code" style="width: 60px; height: 60px;">
                                    <div style="font-size: 10px; color: #6c757d; font-weight: bold; margin-top: 1px;">
                                        {{ $leito->codigo_qr }}
                                    </div>
                                </div>
                            @else
                                <span class="text-muted" style="font-size: 12px;">Não gerado</span>
                            @endif
                        </td>
                        <td>
                            @if ($leito->atualizacao == 'disponivel')
                                <span class="badge bg-success">Disponível</span>
                            @elseif ($leito->atualizacao == 'ocupado')
                                <span class="badge bg-danger">Ocupado</span>
                            @elseif ($leito->atualizacao == 'em_limpeza')
                                <span class="badge bg-info">Em Limpeza</span>
                            @elseif ($leito->atualizacao == 'reservado')
                                <span class="badge bg-warning">Reservado</span>
                            @elseif ($leito->atualizacao == 'manutencao')
                                <span class="badge bg-secondary">Manutenção</span>
                            @elseif ($leito->atualizacao == 'emergencia')
                                <span class="badge bg-light">Emergência</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($leito->data_criacao)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('leito.edit', ['id' => $leito->id]) }}"
                                class="btn btn-primary btn-sm">Editar</a>
                            <button wire:click='delete({{ $leito->id }})'
                                class="btn btn-sm btn-danger">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
