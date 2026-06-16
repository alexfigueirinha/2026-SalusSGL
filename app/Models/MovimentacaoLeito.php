<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoLeito extends Model
{
    use HasFactory;

    protected $table = 'movimentacao_leitos';

    protected $fillable = [
        'internacao_id',
        'paciente_id',
        'movimentacao',
        'motivo',
        'solicitado_por',
        'aprovado_por',
        'observacoes'
    ];


    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function leito()
    {
        return $this->belongsTo(Leito::class, 'leitos_id');
    }

    public function usuarioSolicitado()
    {
        return $this->belongsTo(Usuario::class, 'solicitado_por');
    }

    public function usuarioAprovado()
    {
        return $this->belongsTo(Usuario::class, 'aprovado_por');
    }
}
