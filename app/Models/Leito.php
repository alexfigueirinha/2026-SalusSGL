<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_paciente',
        'atualizacao',
        'quartos_id'
    ];
}