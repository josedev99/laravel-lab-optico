<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    public function index(){
        return view('Modulos.Venta.pages.ventas');
    }

    public function getProductosAll(){
        $sql = "select e.codigo,e.categoria,concat(l.nombre,' ',l.marca,' ',l.diseno, ' (Esf: ',e.esfera, ' ','Cil: ',e.cilindro,')') as descripcion,sum(e.stock) as stock,e.precio_venta from existencias as e inner join lente_terms as l on e.lente_term_id=l.id where e.stock > 0";

        $datos = DB::select($sql);
        return response()->json($datos);
    }
}
