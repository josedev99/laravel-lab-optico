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
            $codigo_exists = request()->get('codigo_exists');
            $codigo = trim(request()->get('codigo_lente_term'));
            $cantidad = (int)request()->get('cantidad_lente_term');
            $esfera_lente = trim(request()->get('esfera_lente'));
            $cilindro_lente = trim(request()->get('cilindro_lente'));
            $lente_term_id = (int)request()->get('lente_term_id');
            $precio_venta = (float)request()->get('precio_venta_term');
            $precio_costo = (float)request()->get('precio_costo_term');
            DB::beginTransaction();
            //validar si codigo exists es igual a codigo form input
            $valid_codigo = ($codigo_exists != "") ? $codigo_exists : $codigo;
            $stock_actual = Existencia::where('codigo',$valid_codigo)->first();

            if($stock_actual){
                if($stock_actual['codigo'] == $codigo_exists){
                    //Validar el signo del valor recibido
                    if($cantidad > 0){
                        $stock_actual->increment('stock',$cantidad,[
                            'codigo' => $codigo,
                            'precio_costo' => $precio_costo,
                            'precio_venta' => $precio_venta
                        ]);
                    }else{
                        if((int)$stock_actual['stock'] >= abs($cantidad)){
                            $stock_actual->decrement('stock',abs($cantidad));
                        }else{
                            return response()->json([
                                'status' => 'error',
                                'message' => 'La cantidad a retirar es mayor al stock actual.'
                            ]);
                        }
                    }
                    $stock_actual->save();
                    DB::commit();
                    $result = true;
                }else{
                    return response()->json([
                        'status' => 'error',
                        'message' => 'El código ingresado para el lente ya se encuentra registrado.'
                    ]);
                }
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
                    'message' => 'Se han ingresado '.$cantidad.' lentes terminados exitosamente.'
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
