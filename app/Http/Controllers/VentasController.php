<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index(){
        return view('Modulos.Venta.pages.ventas');
    }
}
