<?php

namespace App\Http\Controllers;

use App\Models\LenteTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function getLenteTerm() {
        $lentes_terminados = LenteTerm::get();
        $stock_term = [];
    
        foreach ($lentes_terminados as $item) {
            $array = [
                'id' => $item['id'],
                'nombre' => $item['nombre'],
                'marca' => $item['marca'],
                'diseno' => $item['diseno'],
                'esf_desde' => $item['esf_desde'],
                'esf_hasta' => $item['esf_hasta'],
                'cil_desde' => $item['cil_desde'],
                'cil_hasta' => $item['cil_hasta'],
            ];
    
            // Obtener los datos de stock
            $stocks = DB::select("SELECT e.esfera, e.cilindro, SUM(e.stock) AS stock FROM existencias AS e WHERE e.lente_term_id = ? GROUP BY e.esfera, e.cilindro", [$item['id']]);
    
            // Transformar el resultado en un mapa anidado
            $stockMap = [];
            foreach ($stocks as $stock) {
                $esfera = number_format($stock->esfera, 2);
                $cilindro = number_format($stock->cilindro, 2);
                $stockMap[$esfera][$cilindro] = (int) $stock->stock;
            }
    
            $array['stocks'] = $stockMap;
            $stock_term[] = $array;
        }
    
        return response()->json($stock_term);
    }
    
}
