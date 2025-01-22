<?php

namespace App\Http\Controllers;

use App\Models\LenteRoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LenteRotoController extends Controller
{
    public function index(){
        return view('Modulos.Inventario.pages.lente_rotos');
    }

    public function getLentesTerms(){
        $lentes_terms = DB::select("select e.codigo,CONCAT(e.codigo,' | ',' Esfera: ', e.esfera, ' Cilindro: ',e.cilindro) as especif from existencias as e inner join lente_terms as l on e.lente_term_id=l.id");
        return response()->json([
            'status' => 'success',
            'data' => $lentes_terms
        ]);
    }

    public function saveLenteRoto(){
        $buscar_lente = request()->get('buscar_lente');
        $array_lente = explode('|',$buscar_lente);
        $codigo = $array_lente[0];
        $especificaciones = $array_lente[1];

        $cantidad_lente = request()->get('cantidad_lente');
        $justif = request()->get('justif');
        $observaciones = request()->get('observaciones');

        $result = LenteRoto::create([
            'codigo' => $codigo,
            'tipo' => 'lente terminado',
            'cantidad' => $cantidad_lente,
            'especificaciones' => $especificaciones,
            'justificacion' => $justif,
            'observaciones' => $observaciones,
            'usuario_id' => Auth::user()->id, 
        ]);
        if($result){
            return response()->json([
                'status' => 'success',
                'message' => 'El lente roto se ha registrado exitosamente.'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Ha ocurrido un error al intentar registrar el lente roto.'
            ]);
        }
    }
}
