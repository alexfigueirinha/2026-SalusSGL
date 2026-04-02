<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ala extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'total_quartos',
        'data_criacao',
        'descricao'
    ];
}
