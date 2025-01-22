<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LenteRoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'tipo',
        'cantidad',
        'especificaciones',
        'justificacion',
        'observaciones',
        'usuario_id',
    ];
}
