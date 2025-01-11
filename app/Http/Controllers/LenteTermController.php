<?php

namespace App\Http\Controllers;

use App\Models\LenteTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LenteTermController extends Controller
{
    public function lente_term_save(){
        $request = request()->all();
        $usuario_id = Auth::check() ? Auth::user()->id : 0;
        $exists_lente = LenteTerm::where('nombre',$request['nombre_lente'])->where('marca',$request['marca_lente'])->where('diseno',$request['diseno_lente'])->exists();
        if($exists_lente){
            return response()->json([
                'status' => 'warning',
                'message' => 'EL lente terminado ya se encuentra registrado.'
            ]);
        }
        $result = LenteTerm::create([
            'nombre' => $request['nombre_lente'],
            'marca' => $request['marca_lente'],
            'diseno' => $request['diseno_lente'],
            'esf_desde' => $request['esf_desde'],
            'cil_desde' => $request['cil_desde'],
            'esf_hasta' => $request['esf_hasta'],
            'cil_hasta' => $request['cil_hasta'],
            'usuario_id' => $usuario_id,
        ]);
        if($result){
            return response()->json([
                'status' => 'success',
                'message' => 'El lente terminado se ha registro exitosamente.'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Ha ocurrido un error al crear el lente.'
            ],500);
        }
    }

    public function getLenteTerm(){
        $lentes_terminados = LenteTerm::get();
        return response()->json($lentes_terminados);
    }
}
