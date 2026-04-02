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
}
