<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('app.home');

//Routas para inventario
Route::prefix('/inventario')->group(function(){
    Route::get('/', [InventarioController::class, 'index'])->name('inv.index');
});

