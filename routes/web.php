<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ExistenciaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\LenteTermController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

//Login
Route::get('/login',[LoginController::class,'index'])->name('app.login.index');
Route::post('/authUser',[LoginController::class,'login'])->name('app.login.auth');

Route::get('/',[HomeController::class,'index'])->middleware('auth')->name('app.home');
//Routas para inventario
Route::prefix('/inventario')->middleware('auth')->group(function(){
    Route::get('/', [InventarioController::class, 'index'])->name('inv.index');
    //Lentes terminados
    Route::post('lente-terminados',[LenteTermController::class,'lente_term_save'])->name('lente.term.save');
    Route::post('obtener-lentes-terminados',[LenteTermController::class,'getLenteTerm'])->name('lente.term.getAll');
    //Ingreso a inventario
    Route::post('ingreso-lentes-terminados',[ExistenciaController::class,'ingStockLenteTerm'])->name('lente.term.ingreso');
});

Route::prefix('/usuario')->middleware('auth')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/save', [UserController::class, 'save'])->name('user.save');
});

//Ventas
Route::prefix('venta')->middleware('auth')->group(function(){
    Route::get('/laboratorio', [VentasController::class, 'index'])->name('venta.lab.index');
    Route::post('/lab/save', [VentasController::class, 'save'])->name('venta.lab.save');
});