<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Existencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'categoria',
        'stock',
        'stock_min',
        'precio_venta',
        'esfera',
        'cilindro',
        'lente_term_id',
        'usuario_id',
    ];
}
