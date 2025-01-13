<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('Modulos.Usuario.Login');
    }

    public function login(){
        //return Hash::make('josedev99');
        $datos_request = request()->only(['usuario','clave_user']);
        $user = User::where('usuario',$datos_request['usuario'])->first();
        if(!$user){
            return redirect()->back()->with('error', 'Usuario o clave incorrectos.');
        }
        if(Hash::check($datos_request['clave_user'],$user['password'])){
            Auth::login($user);

            return redirect()->route('app.home')->with('success', 'Se ha verificado exitosamente.');
        }else{
            return redirect()->back()->with('error', 'Usuario o clave incorrectos.');
        }
    }
}
