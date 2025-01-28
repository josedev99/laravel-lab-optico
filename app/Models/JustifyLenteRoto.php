<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JustifyLenteRoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoria',
        'justificacion',
        'usuario_id',
    ];
}
