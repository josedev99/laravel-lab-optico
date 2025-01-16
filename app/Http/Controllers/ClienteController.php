<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function getClientes(){
        $clientes = Cliente::OrderBy('id','desc')->get();
        return response()->json($clientes);
    }
}
