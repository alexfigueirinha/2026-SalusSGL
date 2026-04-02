<?php

namespace App\Livewire\Paciente;

use App\Models\Paciente;
use Livewire\Component;

class PacientesIndex extends Component
{
    public function render()
    {
        $pacientes = Paciente::all();
        return view('livewire.paciente.pacientes-index', compact('pacientes'));
    }
}
