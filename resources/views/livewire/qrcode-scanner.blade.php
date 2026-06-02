<div>
   {{-- <div>
    <!-- Escaneamento de QR Code -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Escaneamento de QR Code</h2>
        <p class="text-gray-600 mb-4">Escaneie o QR Code do leito para atualizar seu status rapidamente</p>
        
        <!-- Escanear QR Code Section -->
        <div class="border rounded p-4 mb-6">
            <h3 class="font-medium mb-3">Escanear QR Code</h3>
            
            <div class="mb-3">
                <label class="block mb-1">Código do Leito</label>
                <input type="text" 
                       wire:model="codigoLeito" 
                       placeholder="Digite ou escaneie o QR Code" 
                       class="border rounded px-3 py-2 w-64">
                <small class="text-gray-500 block">Exemplo: QR101A, QR102B, etc.</small>
            </div>
            
            <!-- Atualizar Status -->
            <div>
                <h4 class="font-medium mb-2">Atualizar Status</h4>
                <button wire:click="escanearQRCode" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Escanear
                </button>
            </div>
        </div>
        
        <!-- Mensagem de Status -->
        @if($mensagem)
            <div class="mb-4 p-3 rounded {{ $mensagemTipo === 'erro' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                {{ $mensagem }}
            </div>
        @endif
    </div>
    
    <!-- Códigos QR Disponíveis -->
    <div>
        <h3 class="text-lg font-semibold mb-3">Códigos QR Disponíveis</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
            @foreach($qrsDisponiveis as $qr)
                <div class="border rounded p-3 {{ $qr['status'] === 'Ocupado' ? 'bg-red-50' : ($qr['status'] === 'Disponível' ? 'bg-green-50' : ($qr['status'] === 'Em Limpeza' ? 'bg-yellow-50' : ($qr['status'] === 'Manutenção' ? 'bg-gray-50' : 'bg-blue-50'))) }}">
                    <div class="font-bold text-lg">{{ $qr['codigo'] }}</div>
                    <div class="text-sm text-gray-600">{{ $qr['leito'] }}</div>
                    <div class="text-sm text-gray-600">Q. {{ $qr['quarto'] }}</div>
                    <div class="font-medium mt-2 {{ $qr['status'] === 'Ocupado' ? 'text-red-600' : ($qr['status'] === 'Disponível' ? 'text-green-600' : ($qr['status'] === 'Em Limpeza' ? 'text-yellow-600' : ($qr['status'] === 'Manutenção' ? 'text-gray-600' : 'text-blue-600'))) }}">
                        {{ $qr['status'] }}
                    </div>
                    <button wire:click="selecionarQRCode('{{ $qr['codigo'] }}')" 
                            class="mt-2 text-sm bg-gray-100 px-2 py-1 rounded hover:bg-gray-200">
                        Selecionar
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}
</div>
