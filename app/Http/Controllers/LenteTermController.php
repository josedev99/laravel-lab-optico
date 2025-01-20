<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvLenteTermRequest;
use App\Models\LenteTerm;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class LenteTermController extends Controller
{
    public function lente_term_save(InvLenteTermRequest $req){
        $usuario_id = Auth::check() ? Auth::user()->id : 0;
        //validacion de campos
        $request = $req->validated();

        $nombre_tabla = strtoupper(trim($request['nombre_lente']));
        $marca = strtoupper(trim($request['marca_lente']));
        $diseno = strtoupper(trim($request['diseno_lente']));

        $datos_form = [
            'nombre' => $nombre_tabla,
            'marca' => $marca,
            'diseno' => $diseno,
            'esf_desde' => $request['esf_desde'],
            'cil_desde' => $request['cil_desde'],
            'esf_hasta' => $request['esf_hasta'],
            'cil_hasta' => $request['cil_hasta'],
        ];
        //validar edicion de tabla_term
        $tabla_id = !is_null(request()->get('tabla_id')) ? (int)request()->get('tabla_id') : false;
        if($tabla_id){
            $result = LenteTerm::where('id', $tabla_id)->update($datos_form);
            $message = 'La tabla de lentes terminados se ha actualizado exitosamente.';
        }else{
            $exists_lente = LenteTerm::where('nombre',$nombre_tabla)->where('marca',$marca)->where('diseno',$diseno)->exists();
            if($exists_lente){
                return response()->json([
                    'status' => 'warning',
                    'message' => 'EL lente terminado ya se encuentra registrado.'
                ]);
            }
            $result = LenteTerm::create(array_merge($datos_form,[
                'usuario_id' => $usuario_id
            ]));
            $message = 'La tabla de lentes terminados se ha registrado exitosamente.';
        }

        if($result){
            return response()->json([
                'status' => 'success',
                'message' => $message
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
            $stocks = DB::select("SELECT e.codigo,e.esfera, e.cilindro, SUM(e.stock) AS stock,precio_costo,precio_venta FROM existencias AS e WHERE e.lente_term_id = ? GROUP BY e.esfera, e.cilindro", [$item['id']]);
    
            $array['stocks'] = $stocks;
            $stock_term[] = $array;
        }
    
        return response()->json($stock_term);
    }

    public function getTableId(){
        try{
            $id = request()->get('id');
            $tabla_term = LenteTerm::where('id', $id)->first();
            return response()->json([
                'status' => 'success',
                'message' => 'Datos obtenidos exitosamente.',
                'result' => $tabla_term
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'error: ' . $e->getMessage(),
                'result' => null
            ]);
        }
    }
    
}
