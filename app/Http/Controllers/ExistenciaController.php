<?php

namespace App\Http\Controllers;

use App\Models\Existencia;
use Illuminate\Http\Request;

class ExistenciaController extends Controller
{
    public function ingStockLenteTerm(){
        //return request()->all();
        $codigo = trim(request()->get('codigo_lente_term'));
        $categoria = trim(request()->get('codigo_lente_term'));
        $cantidad = (int)request()->get('cantidad_lente_term');
        $esfera_lente = request()->get('esfera_lente');
        $cilindro_lente = request()->get('cilindro_lente');
        $lente_term_id = (int)request()->get('lente_term_id');
        $precio_venta_term = (float)request()->get('precio_venta_term');

        $result = Existencia::create([
            'codigo' => $codigo,
            'categoria' => 'Lente Term',
            'stock' => $cantidad,
            'precio_venta' => $precio_venta_term,
            'esfera' => $esfera_lente,
            'cilindro' => $cilindro_lente,
            'lente_term_id' => $lente_term_id,
            'usuario_id' => 1
        ]);

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
    }
}
