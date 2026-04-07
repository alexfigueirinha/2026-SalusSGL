<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_hora_entrada',
        'data_hora_saida',
        'pacientes_id',
        'leitos_id',
        'alas_id',
        'quartos_id'
    ];

    public function alas()
    {
        return $this->belongsTo(Ala::class);
    }

    public function quartos()
    {
        return $this->belongsTo(Quarto::class);
    }

    public function leitos()
    {
        return $this->belongsTo(Leito::class);
    }

    public function pacientes()
    {
        return $this->belongsTo(Paciente::class);
    }
}
