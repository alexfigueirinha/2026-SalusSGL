<?php

namespace App\Livewire\StatusQuarto;

use App\Models\StatusQuarto;
use Livewire\Component;

class StatusQuartosCreate extends Component
{
    public $status;
    public $quartos_id;

    public function store()
    {
        StatusQuarto::create([
            'status' => $this->status,
            'quartos_id' => $this->quartos_id
        ]);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('status.quarto.index');
    }

    public function render()
    {
        return view('livewire.status-quarto.status-quartos-create');
    }
}
