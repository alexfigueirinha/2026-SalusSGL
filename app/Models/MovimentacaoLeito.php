<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoLeito extends Model
{
    use HasFactory;

    protected $table = 'movimentacao_leitos';

    protected $fillable = [
        'pacientes_id',
        'leitos_id',
        'motivo',
        'solicitado_por',
        'aprovado_por',
        'observacoes'
    ];

    public function paciente() {
        return $this->belongsTo(Paciente::class, 'pacientes_id');
    }

    public function leito() {
        return $this->belongsTo(Leito::class, 'leitos_id');
    }

    public function usuarioSolicitado() {
        return $this->belongsTo(User::class, 'solicitado_por');
    }

    public function usuarioAprovado() {
        return $this->belongsTo(User::class, 'aprovado_por');
    }
}
