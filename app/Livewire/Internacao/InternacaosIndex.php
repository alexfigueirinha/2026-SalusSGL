<?php

namespace App\Livewire\Internacao;

use App\Models\Internacao;
use Livewire\Component;

class InternacaosIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $internacao = Internacao::find($id);

        if ($internacao != null) {
            $internacao->delete();
            session()->flash('success', 'Excluído');
        }
    }
    public function render()
    {
        $internacaos = Internacao::where('pacientes_id', 'like', '%' . $this->search . '%')->get();
        return view('livewire.internacao.internacaos-index', compact('internacaos'));
    }
}
