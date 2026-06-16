<div style="padding: 24px; background-color: #f9fafb; min-height: 100vh; font-family: system-ui, -apple-system, sans-serif; color: #374151; box-sizing: border-box; width: 100%;">
    
    <!-- Cabeçalho -->
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 22px; font-weight: 700; color: #111827; margin: 0 0 4px 0;">Histórico de Movimentações</h1>
        <p style="font-size: 13px; color: #6b7280; margin: 0;">Registro completo de todas as movimentações de pacientes entre leitos</p>
    </div>

    <!-- Barra de Busca -->
    <div style="background-color: #ffffff; padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); margin-bottom: 20px;">
        <div style="position: relative; display: flex; align-items: center; max-width: 350px;">
            <span style="position: absolute; left: 12px; color: #9ca3af; display: flex; align-items: center;">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </span>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar no histórico..." 
                   style="width: 100%; border: 1px solid #d1d5db; color: #111827; font-size: 13px; border-radius: 6px; padding: 10px 12px 10px 36px; box-sizing: border-box; background-color: #f9fafb;">
        </div>
    </div>

    <!-- Tabela de Histórico -->
    <div style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); overflow-x: auto; margin-bottom: 24px;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px;">
            <thead>
                <tr style="border-bottom: 1px solid #e5e7eb; color: #4b5563; font-weight: 600; background-color: #fcfcfc;">
                    <th style="padding: 14px 16px;">Data/Hora</th>
                    <th style="padding: 14px 16px;">Paciente</th>
                    <th style="padding: 14px 16px;">Movimentação (Leito)</th>
                    <th style="padding: 14px 16px;">Motivo</th>
                    <th style="padding: 14px 16px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movimentacoes as $mov)
                    <tr style="border-bottom: 1px solid #f3f4f6; color: #1f2937;">
                        <td style="padding: 14px 16px; font-weight: 500;">
                            <div>{{ $mov->created_at->format('d/m/Y') }}</div>
                            <div style="font-size: 11px; color: #9ca3af;">{{ $mov->created_at->format('H:i:s') }}</div>
                        </td>
                        <td style="padding: 14px 16px; font-weight: 600;">{{ $mov->paciente->nome ?? 'N/A' }}</td>
                        <td style="padding: 14px 16px;">{{ $mov->leito->leito ?? 'N/A' }}</td>
                        <td style="padding: 14px 16px; color: #4b5563;">{{ $mov->motivo ?? 'Transferência' }}</td>
                        <td style="padding: 14px 16px;">
                            <button type="button" wire:click="delete({{ $mov->id }})" onclick="confirm('Excluir este registro?') || event.stopImmediatePropagation()" style="color: #dc2626; background: none; border: none; cursor: pointer; font-weight: 600; padding: 0;">Excluir</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 32px; text-align: center; color: #9ca3af;">Nenhuma movimentação listada no histórico.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div style="padding: 12px 16px;">
            {{ $movimentacoes->links() }}
        </div>
    </div>

    <!-- Cards Resumos -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
        <div style="background-color: #ffffff; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
            <div style="font-size: 12px; font-weight: 600; color: #6b7280; margin-bottom: 16px;">Total de Movimentações</div>
            <div style="font-size: 28px; font-weight: 700; color: #111827; margin-bottom: 4px;">{{ $totalMovimentacoes }}</div>
            <div style="font-size: 11px; color: #9ca3af;">Registradas no sistema</div>
        </div>

        <div style="background-color: #ffffff; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
            <div style="font-size: 12px; font-weight: 600; color: #6b7280; margin-bottom: 16px;">Últimas 24 horas</div>
            <div style="font-size: 28px; font-weight: 700; color: #111827; margin-bottom: 4px;">{{ $ultimas24Horas }}</div>
            <div style="font-size: 11px; color: #9ca3af;">Movimentações recentes</div>
        </div>

        <div style="background-color: #ffffff; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
            <div style="font-size: 12px; font-weight: 600; color: #6b7280; margin-bottom: 16px;">Última Movimentação</div>
            @if($ultimaMovimentacao)
                <div style="font-size: 14px; font-weight: 700; color: #111827; margin-bottom: 2px;">{{ $ultimaMovimentacao->paciente->nome ?? 'N/A' }}</div>
                <div style="font-size: 11px; color: #9ca3af;">{{ $ultimaMovimentacao->created_at->format('d/m/Y, H:i:s') }}</div>
            @else
                <div style="font-size: 13px; color: #9ca3af;">Nenhuma movimentação realizada</div>
            @endif
        </div>
    </div>

</div>
