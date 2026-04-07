<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLeito extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'leitos_id'
    ];

    public function leitos()
    {
        return $this->belongsTo(Leito::class);
    }
}
