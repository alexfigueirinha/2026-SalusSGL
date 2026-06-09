<?php

namespace App\Livewire\Ala;

use App\Models\Ala;
use Livewire\Component;

class AlasIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $ala = Ala::find($id);

        if ($ala != null) {
            $ala->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()
    {

        $alas = Ala::where('nome', 'like', '%' . $this->search . '%')->get();
        return view('livewire.ala.alas-index', compact('alas'));
    }
}
