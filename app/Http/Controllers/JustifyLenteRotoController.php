<?php

namespace App\Http\Controllers;

use App\Models\JustifyLenteRoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JustifyLenteRotoController extends Controller
{
    public function save(){
        $usuario_id = Auth::user()->id;
        $categoria = request()->get('checkCatLenteRoto');
        $justificacion = trim(request()->get('justify_lente_roto'));//strtoupper
        $result = JustifyLenteRoto::create([
            'categoria' => $categoria,
            'justificacion' => $justificacion,
            'usuario_id' => $usuario_id
        ]);

        if($result){
            return response()->json([
                'status' => 'success',
                'message' => 'La justificación para el lente roto se ha registrado.',
                'data' => [
                    'categoria' => $categoria,
                    'justificacion' => $justificacion
                ]
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Ha ocurrido un error al momento de registrar la justificación',
            'data' => []
        ]);
    }

    public function getJustifyLenteRoto(){
        $categoria = request()->get('categoria');
        $justificaciones = JustifyLenteRoto::where('categoria', $categoria)->get();
        return response()->json([
            'status' => 'success',
            'data' => $justificaciones
        ]);
    }
}
