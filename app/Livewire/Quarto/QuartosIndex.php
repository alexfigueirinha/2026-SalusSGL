<?php

namespace App\Livewire\Quarto;

use App\Models\Quarto;
use Livewire\Component;

class QuartosIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $quarto = Quarto::find($id);

        if ($quarto != null) {
            $quarto->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()
    {
        $quartos = Quarto::all();
        return view('livewire.quarto.quartos-index', compact('quartos'));
    }
}
