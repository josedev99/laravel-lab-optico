<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\LenteTermController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('app.home');
//Login

//Routas para inventario
Route::prefix('/inventario')->group(function(){
    Route::get('/', [InventarioController::class, 'index'])->name('inv.index');
    //Lentes terminados
    Route::post('lente-terminados',[LenteTermController::class,'lente_term_save'])->name('lente.term.save');
    Route::post('obtener-lentes-terminados',[LenteTermController::class,'getLenteTerm'])->name('lente.term.getAll');
});

Route::prefix('/usuario')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/save', [UserController::class, 'save'])->name('user.save');
});