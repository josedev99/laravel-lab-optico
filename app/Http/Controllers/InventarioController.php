<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index(){
        return view('Modulos.Inventario.pages.lente_term');
    }
}
