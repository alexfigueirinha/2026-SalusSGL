<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leito extends Model
{
    use HasFactory;

    protected $fillable = [
        'leito',
        'status',
        'atualizacao',
        'data_criacao',
        'quartos_id',
        'alas_id',
        'codigo_qr' 
    ];

    public function quartos() 
    {
        return $this->belongsTo(Quarto::class, 'quartos_id'); 
    }

    public function alas() 
    {
        return $this->belongsTo(Ala::class, 'alas_id'); 
    }
    
    public function statusLeitos() 
    {
        return $this->hasMany(StatusLeito::class, 'leitos_id'); 
    }

    public function movimentacaoLeito() 
    {
        return $this->hasMany(MovimentacaoLeito::class, 'leitos_id'); 
    }

    public function internacaos() 
    {
        return $this->hasMany(Internacao::class, 'leitos_id'); 
    }

    public function internacaoAtiva()
    {
        return $this->hasOne(Internacao::class, 'leitos_id')
            ->whereNull('data_hora_saida')
            ->orderBy('data_hora_entrada', 'desc');
    }
}