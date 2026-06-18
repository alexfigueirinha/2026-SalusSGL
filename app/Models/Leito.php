<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leito extends Model
{
    use HasFactory;

    protected $fillable = [
        'leito',
        'atualizacao',
        'data_criacao',
        'quartos_id',
        'alas_id',
        'codigo_qr' 
    ];

    public function quartos() {
    return $this->belongsTo(Quarto::class, 'quartos_id'); 
    }

    public function alas() {
    return $this->belongsTo(Ala::class); 
    }
    
    public function statusLeitos() {
    return $this->hasMany(StatusLeito::class, 'leitos_id'); 
    }

    public function movimentacaoLeito() {
    return $this->hasMany(MovimentacaoLeito::class); 
    }

    public function internacaos() {
    return $this->hasMany(Internacao::class); 
    }
}
