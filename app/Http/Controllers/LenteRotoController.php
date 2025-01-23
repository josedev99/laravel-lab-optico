<?php

namespace App\Http\Controllers;

use App\Models\LenteRoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
        date_default_timezone_set('America/El_Salvador');
        $buscar_lente = request()->get('buscar_lente');
        $array_lente = explode('|',$buscar_lente);
        $codigo = $array_lente[0];
        $especificaciones = $array_lente[1];

        $cantidad_lente = request()->get('cantidad_lente');
        $justif = request()->get('justif');
        $observaciones = request()->get('observaciones');

        $result = LenteRoto::create([
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
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

    public function listar_lentes_rotos(){
        $datos = DB::select("select lr.id,lr.codigo,lr.fecha,lr.hora,lr.cantidad,lr.especificaciones,lr.justificacion,u.nombre from lente_rotos as lr inner join users as u on lr.usuario_id=u.id order by lr.id desc;");

        $contador = 1;
        $data = [];
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $contador;
            $sub_array[] = $row->codigo;
            $sub_array[] = date('d/m/Y H:i:s A',strtotime($row->fecha . '' . $row->hora));
            $sub_array[] = $row->cantidad;
            $sub_array[] = $row->especificaciones;
            $sub_array[] = $row->justificacion;
            $sub_array[] = $row->nombre;
            $sub_array[] = '
            <button onclick="removeLenteRoto(this)" data-key="'. encrypt($row->id) .'" title="Eliminar el reporte de lente" class="btn btn-outline-danger btn-sm btn-destroy" style="border:none;font-size:18px"><i class="bi bi-x-circle"></i></button>
            ';

            $data[] = $sub_array;
            $contador ++;
        }

        $results = array(
            "sEcho" => 1, // Información para el datatables
            "iTotalRecords" => count($data), // enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), // enviamos el total registros a visualizar
            "aaData" => $data
        );
        return response()
            ->json($results)
            ->header('Content-Type', 'application/json')
            ->header('Cache-Control', 'max-age=86400');
    }

    public function removeLenteRoto(){
        $id = Crypt::decrypt(request()->get('key'));

        $result = LenteRoto::where('id', $id)->delete();

        if($result){
            return response()->json([
                'status' => 'success',
                'message' => 'El lente roto se ha eliminado exitosamente.'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Ha ocurrido un error al momento de eliminar el lente roto.'
        ]);
    }
}
