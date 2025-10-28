<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VehiculoController;


// Página principal
Route::get('/', function () {
    return view('dashboard');
});

// Panel del administrador (sin login)
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Panel general del usuario (si luego lo usas)
Route::get('/home', [HomeController::class, 'index'])->name('home');

//ver vehiculos
Route::get('/vehiculo', [VehiculoController::class, 'index'])->name('vehiculo.index');

