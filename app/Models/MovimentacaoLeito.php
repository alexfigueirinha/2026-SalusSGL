<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoLeito extends Model
{
    use HasFactory;

    protected $fillable =[
        'quartos_id',
        'leitos_id',
        'usuarios_id'
    ];

    public function quartos()
    {
        return $this->belongsTo(Quarto::class);
    }

    public function leitos()
    {
        return $this->belongsTo(Leito::class);
    }

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class);
    }
}
