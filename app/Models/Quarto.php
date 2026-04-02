<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_leitos',
        'data_criacao',
        'alas_id'
    ];

    public function leitos()
    {
        return $this->hasMany(Leito::class);
    }
}
