<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nome',
        'email',
        'tipo',
        'telefone',
        'status',
        'senha',
        'data_cadastro',
    ];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function movimentacaoLeitos()
    {
        return $this->hasMany(MovimentacaoLeito::class);
    }
}
