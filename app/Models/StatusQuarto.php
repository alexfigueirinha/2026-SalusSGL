<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusQuarto extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'quartos_id'
    ];
}
