<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LenteTerm extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'marca',
        'diseno',
        'esf_desde',
        'cil_desde',
        'esf_hasta',
        'cil_hasta',
        'usuario_id',
    ];
}
