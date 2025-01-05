<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('Modulos.Usuario.Index');
    }
    public function save(){
        return request()->all();
    }
}
