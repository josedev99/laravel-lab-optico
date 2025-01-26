<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LenteRoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'hora',
        'codigo',
        'tipo',
        'cantidad',
        'especificaciones',
        'lente_id',
        'justificacion',
        'observaciones',
        'usuario_id',
    ];
}
