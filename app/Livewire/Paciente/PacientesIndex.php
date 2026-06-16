<?php

namespace App\Livewire\Paciente;

use App\Models\Paciente;
use Livewire\Component;

class PacientesIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $paciente = Paciente::find($id);

        if ($paciente != null) {
            $paciente->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()
    {
        $pacientes = Paciente::where('nome', 'like', '%' . $this->search . '%')->get();
        return view('livewire.paciente.pacientes-index', compact('pacientes'));
    }
}
