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
        $sql = "select e.codigo,e.categoria,sum(e.stock) as stock,e.precio_venta,e.esfera,e.cilindro,l.nombre,l.marca,l.diseno from existencias as e inner join lente_terms as l on e.lente_term_id=l.id group by e.esfera,e.cilindro,e.codigo;";

        $datos = DB::select($sql);
        return response()->json($datos);
    }
}
