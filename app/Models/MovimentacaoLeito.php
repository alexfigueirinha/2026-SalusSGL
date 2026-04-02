<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoLeito extends Model
{
    use HasFactory;

    protected $fillable =[
        'quartos_id',
        'leitos_id'
    ];
}
