<?php

namespace App\Livewire\Leito;

use App\Models\Leito;
use Livewire\Component;

class LeitosIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $leito = Leito::find($id);

        if ($leito != null) {
            $leito->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()
    {

        $leitos = Leito::all();
        return view('livewire.leito.leitos-index', compact('leitos'));
    }
}
