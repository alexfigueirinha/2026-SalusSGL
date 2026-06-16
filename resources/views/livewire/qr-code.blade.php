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
                        <a href="{{ route('qrCode') }}" class="nav-link">
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

<div style="padding: 24px; background-color: #f9fafb; min-height: 100vh; font-family: system-ui, -apple-system, sans-serif; color: #374151; box-sizing: border-box; width: 100%;">
    
    <!-- Cabeçalho Principal -->
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 4px 0;">Escaneamento de QR Code</h1>
        <p style="font-size: 12px; color: #6b7280; margin: 0;">Escaneie o QR Code do leito para atualizar seu status rapidamente.</p>
    </div>

    <!-- Layout Superior de Duas Colunas -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; margin-bottom: 32px;">
        
        <!-- Coluna Esquerda: Escaneamento e Informações -->
        <div style="background-color: #ffffff; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <div style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 16px;">
                    <svg width="16" height="16" style="color: #6b7280; display: block;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h.01M16 20h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2m-8 0H4a2 2 0 00-2 2v2a2 2 0 002 2h2m0-16H4a2 2 0 00-2 2v2a2 2 0 002 2h2m12-4h2a2 2 0 002-2V4a2 2 0 00-2-2h-2m-8 0H4a2 2 0 00-2-2v2a2 2 0 002-2h2"></path>
                    </svg>
                    <span>Escanear QR Code</span>
                </div>

                <label style="display: block; font-size: 12px; font-weight: 500; color: #4b5563; margin-bottom: 4px;">Código do Leito</label>
                <div style="position: relative; display: flex; align-items: center; margin-bottom: 16px;">
                    <input type="text" wire:model.live.debounce.500ms="codigoQrInput" placeholder="Exemplo: QR101A, QR102B, etc." 
                           style="width: 100%; border: 1px solid #d1d5db; color: #111827; font-size: 12px; border-radius: 8px; padding: 10px 100px 10px 12px; box-sizing: border-box;">
                    <button type="button" style="position: absolute; right: 4px; top: 4px; bottom: 4px; background-color: #0f172a; color: #ffffff; font-size: 12px; padding: 0 16px; border: none; border-radius: 6px; cursor: pointer;">
                        Escanear
                    </button>
                </div>

                <!-- Card de Informação do Leito Ativo (Sem condicionais complexas) -->
                <div style="border: 1px solid #dbeafe; background-color: rgba(239, 246, 255, 0.5); border-radius: 8px; padding: 16px; margin-top: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                        <div>
                            <h3 style="font-size: 16px; font-weight: 700; color: #111827; margin: 0;">Leito Ativo</h3>
                            <p style="font-size: 12px; color: #6b7280; margin: 2px 0 0 0;">Verifique as informações abaixo</p>
                        </div>
                        <span style="padding: 4px 10px; font-size: 12px; font-weight: 600; border-radius: 9999px; color: #1e3a8a; background-color: #dbeafe;">
                            Monitorado
                        </span>
                    </div>
                    
                    <div style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 12px;">
                        <span style="font-size: 10px; text-transform: uppercase; font-weight: 700; color: #9ca3af; display: block; margin-bottom: 2px;">Paciente Selecionado</span>
                        <p style="font-size: 14px; font-weight: 600; color: #1f2937; margin: 0;">{{ $pacienteAtual }}</p>
                    </div>
                </div>
            </div>

            <div style="font-size: 11px; color: #9ca3af; padding-top: 8px; border-top: 1px solid #f3f4f6; margin-top: 16px;">
                Foco no leitor de QR Code para atualizar
            </div>
        </div>

        <!-- Coluna Direita: Formulário de Atualização -->
        <div style="background-color: #ffffff; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
            <form wire:submit.prevent="atualizarStatus" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between; margin: 0;">
                <div>
                    <div style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 16px;">
                        <svg width="16" height="16" style="color: #6b7280; display: block;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 15H19M9 5a7 7 0 0112 5v1m-7 8H4v-4"></path>
                        </svg>
                        <span>Atualizar Status</span>
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label style="display: block; font-size: 12px; font-weight: 500; color: #4b5563; margin-bottom: 4px;">Novo Status</label>
                        <select wire:model="novoStatus" style="width: 100%; background-color: #f9fafb; border: 1px solid #d1d5db; color: #111827; font-size: 12px; border-radius: 8px; padding: 10px; box-sizing: border-box;">
                            <option value="">Selecione o status</option>
                            <option value="Ocupado">Ocupado</option>
                            <option value="Disponivel">Disponível</option>
                            <option value="Em Limpeza">Em Limpeza</option>
                            <option value="Manutencao">Manutenção</option>
                            <option value="Emergencia">Emergência</option>
                            <option value="Reservado">Reservado</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label style="display: block; font-size: 12px; font-weight: 500; color: #4b5563; margin-bottom: 4px;">Responsável pela Atualização *</label>
                        <select wire:model="responsavel" style="width: 100%; background-color: #f9fafb; border: 1px solid #d1d5db; color: #111827; font-size: 12px; border-radius: 8px; padding: 10px; box-sizing: border-box;">
                            <option value="">Selecione o responsável</option>
                            <option value="1">Enfermagem Geral</option>
                            <option value="2">Equipe de Higienização</option>
                            <option value="3">Médico</option>
                        </select>
                    </div>
                </div>

                <button type="submit" style="width: 100%; background-color: #64748b; color: #ffffff; font-size: 12px; font-weight: 600; padding: 12px; border: none; border-radius: 6px; cursor: pointer; margin-top: 16px;">
                    Atualizar Status
                </button>
            </form>
        </div>
    </div>

    <!-- Seção Inferior: Grid de Códigos QR Disponíveis -->
    <div style="background-color: #ffffff; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
        <h2 style="font-size: 14px; font-weight: 700; color: #111827; margin: 0 0 16px 0;">Códigos QR Disponíveis</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 16px;">
            @foreach($leitosDisponiveis as $item)
                <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 12px; background-color: #ffffff; display: flex; flex-direction: column; justify-content: space-between; cursor: pointer;" wire:click="$set('codigoQrInput', '{{ $item->leito }}')">
                    <div>
                        <div style="display: flex; align-items: center; gap: 4px; font-size: 10px; color: #9ca3af; margin-bottom: 4px;">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01"></path>
                            </svg>
                            <span style="font-family: monospace;">QR{{ $item->id }}</span>
                        </div>
                        <div style="font-size: 12px; font-weight: 700; color: #1f2937;">{{ $item->leito }}</div>
                    </div>
                    
                    <div style="margin-top: 12px;">
                        <span style="display: inline-block; font-size: 10px; font-weight: 700; padding: 2px 8px; border-radius: 6px; color: #374151; background-color: #e5e7eb;">
                            {{ $item->atualizacao }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
