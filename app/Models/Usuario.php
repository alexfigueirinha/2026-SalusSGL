<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'tipo',
        'telefone',
        'data_cadastro',
    ];

    public function movimentacaoLeitos()
    {
        return $this->hasMany(MovimentacaoLeito::class);
    }
}
