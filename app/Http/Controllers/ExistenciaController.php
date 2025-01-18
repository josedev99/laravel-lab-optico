<?php

namespace App\Http\Controllers;

use App\Models\Existencia;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExistenciaController extends Controller
{
    public function ingStockLenteTerm(){
        //return request()->all();
        try{
            $codigo = trim(request()->get('codigo_lente_term'));
            $cantidad = (int)request()->get('cantidad_lente_term');
            $esfera_lente = trim(request()->get('esfera_lente'));
            $cilindro_lente = trim(request()->get('cilindro_lente'));
            $lente_term_id = (int)request()->get('lente_term_id');
            $precio_venta = (float)request()->get('precio_venta_term');
            $precio_costo = (float)request()->get('precio_costo_term');
            DB::beginTransaction();
            //validar datos repetidos
            /**$exists = Existencia::where('codigo',$codigo)->where('lente_term_id',$lente_term_id)->exists();
            if($exists){
                return response()->json([
                    'status' => 'error',
                    'message' => 'El código ingresado para el lente ya se encuentra registrado.'
                ]);
            }**/
            //validar stock
            $stock_actual = Existencia::where('codigo',$codigo)->where('esfera',$esfera_lente)->where('cilindro',$cilindro_lente)->where('lente_term_id',$lente_term_id)->first();
            if($stock_actual){
                $stock_actual->increment('stock',$cantidad,[
                    'precio_costo' => $precio_costo,
                    'precio_venta' => $precio_venta
                ]);
                $stock_actual->save();
                DB::commit();
                $result = true;
            }else{
                $result = Existencia::create([
                    'codigo' => $codigo,
                    'categoria' => 'Lente Term',
                    'stock' => $cantidad,
                    'precio_costo' => $precio_costo,
                    'precio_venta' => $precio_venta,
                    'esfera' => $esfera_lente,
                    'cilindro' => $cilindro_lente,
                    'lente_term_id' => $lente_term_id,
                    'usuario_id' => 1
                ]);
                DB::commit();
            }

            if($result){
                return response()->json([
                    'status' => 'success',
                    'message' => 'El lente terminado se ha ingresado exitosamente.'
                ]);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Ha ocurrido un error al ingresar el lente terminado.'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Ha ocurrido un error inesperado, intente nuevamente.',
                'messageError' => $e->getMessage()
            ]);
        }
    }
}
