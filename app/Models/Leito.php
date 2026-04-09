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
        'quartos_id'
    ];

    public function quartos()
    {
        return $this->belongsTo(Quarto::class);
    }

    public function internacaos()
    {
        return $this->hasMany(Internacao::class);
    }

    public function statusLeitos()
    {
        return $this->hasMany(StatusLeito::class);
    }

    public function movimentacaoLeitos()
    {
        return $this->hasMany(MovimentacaoLeito::class);
    }
}
