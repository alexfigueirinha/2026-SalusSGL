<?php

namespace App\Livewire\StatusLeito;

use App\Models\Leito;
use App\Models\StatusLeito;
use Livewire\Component;

class StatusLeitosIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $statusLeito = StatusLeito::find($id);

        if ($statusLeito != null) {
            $statusLeito->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()
    {

        $statusLeitos = StatusLeito::all();

        return view('livewire.status-leito.status-leitos-index', compact('statusLeitos'));
    }
}