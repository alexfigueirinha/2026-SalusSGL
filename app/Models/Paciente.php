<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'telefone'
    ];

    public function internacaos()
    {
        return $this->hasMany(Internacao::class, 'pacientes_id');
    }

    public function internacaoAtiva()
    {
        return $this->hasOne(Internacao::class, 'pacientes_id')
            ->whereNull('data_hora_saida')
            ->orderBy('data_hora_entrada', 'desc');
    }
}