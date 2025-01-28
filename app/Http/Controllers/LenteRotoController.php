<?php

namespace App\Http\Controllers;

use App\Models\Existencia;
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
        $lente_temns_all = DB::select("select l.id,l.nombre, l.marca,l.diseno from lente_terms as l order by l.id desc");
        $lentes_all = [];
        foreach($lente_temns_all as $term){
            $array = [
                'id' => $term->id,
                'nombre' => $term->nombre,
                'marca' => $term->marca,
                'diseno' => $term->diseno,
            ];
            $stocks = DB::select("select e.id,e.lente_term_id,e.codigo,CONCAT(e.codigo,' | ',' Esfera: ', e.esfera, ' Cilindro: ',e.cilindro) as especif from existencias as e where e.lente_term_id = ?",[$term->id]);
            $array['stocks'] = $stocks;  
            $lentes_all[] = $array;
        }
        return response()->json([
            'status' => 'success',
            'data' => $lentes_all
        ]);
    }

    public function saveLenteRoto(){
        date_default_timezone_set('America/El_Salvador');
        $buscar_lente = request()->get('lente_especif');
        $array_lente = explode('|',$buscar_lente);
        $codigo = $array_lente[0];
        $especificaciones = $array_lente[1];

        $cantidad_lente = request()->get('cantidad_lente');
        $justif = request()->get('justif');
        $observaciones = !is_null(request()->get('observaciones')) ? request()->get('observaciones') : '-';
        $lente_id = request()->get('tipo_lente');
        $tipo = request()->get('checkOptions');

        $result = LenteRoto::create([
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'codigo' => $codigo,
            'tipo' => $tipo,
            'cantidad' => $cantidad_lente,
            'especificaciones' => $especificaciones,
            'justificacion' => $justif,
            'lente_id' => $lente_id,
            'observaciones' => $observaciones,
            'usuario_id' => Auth::user()->id, 
        ]);
        $this->validDecrementStock($tipo,$codigo,$lente_id,$cantidad_lente);
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

    public function validDecrementStock($tipo, $codigo,$lente_id, $cantidad){
        if($tipo == "Bodega"){
            $result = Existencia::where('codigo', $codigo)->where('lente_term_id',$lente_id)->where('stock','>',0)->decrement('stock',$cantidad);
            return $result;
        }
        return false;
    }

    public function listar_lentes_rotos(){
        $datos = DB::select("select lr.id,lr.codigo,lr.fecha,lr.hora,lr.tipo,lr.cantidad,concat(l.nombre,' ',l.marca,' ',l.diseno,' - ',trim(lr.especificaciones)) as especificaciones,lr.justificacion,u.nombre from lente_rotos as lr inner join lente_terms as l on lr.lente_id=l.id inner join users as u on lr.usuario_id=u.id order by lr.id desc;");

        $contador = 1;
        $data = [];
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $contador;
            $sub_array[] = $row->codigo;
            $sub_array[] = date('d/m/Y H:i:s A',strtotime($row->fecha . '' . $row->hora));
            $sub_array[] = $row->tipo;
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
