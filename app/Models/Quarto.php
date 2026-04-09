<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    use HasFactory;

    protected $fillable = [
        'quarto',
        'total_leitos',
        'alas_id'
    ];

    public function alas()
    {
        return $this->belongsTo(Ala::class);
    }

    public function leitos()
    {
        return $this->hasMany(Leito::class);
    }

    public function internacaos()
    {
        return $this->hasMany(Internacao::class);
    }

    public function statusQuartos()
    {
        return $this->hasMany(StatusQuarto::class);
    }

    public function movimentacaoLeitos()
    {
        return $this->hasMany(MovimentacaoLeito::class);
    }
}
