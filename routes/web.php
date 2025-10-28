<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\EmpresaAuthController;
use App\Http\Controllers\ChoferController;

// 🌐 Página principal
Route::get('/', function () {
    return view('dashboard');
});

// 🧩 Panel del administrador general
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// 👤 Panel general del usuario (si luego agregas login de usuarios)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 🚗 Listado de vehículos
Route::get('/vehiculo', [VehiculoController::class, 'index'])->name('vehiculo.index');


// ===============================
// 🚀 LOGIN DE EMPRESAS
// ===============================

// Mostrar formulario de login
Route::get('/empresa/login', [EmpresaAuthController::class, 'showLogin'])->name('empresa.login');

// Procesar login
Route::post('/empresa/login', [EmpresaAuthController::class, 'login'])->name('empresa.login.post');

// ✅ Grupo protegido: solo si la empresa está logueada
Route::middleware('empresa.auth')->group(function () {

    // 📊 Panel privado de empresa
    Route::get('/empresa/dashboard', [EmpresaAuthController::class, 'dashboard'])->name('empresa.dashboard');

    // 🚪 Cerrar sesión
    Route::get('/empresa/logout', [EmpresaAuthController::class, 'logout'])->name('empresa.logout');

    // ===============================
    // 🧾 CRUD DE CHOFERES
    // ===============================
    Route::post('/chofer/store', [ChoferController::class, 'store'])->name('chofer.store');
    Route::put('/chofer/{id}', [ChoferController::class, 'update'])->name('chofer.update');
    Route::delete('/chofer/{id}', [ChoferController::class, 'destroy'])->name('chofer.destroy');

    // ===============================
    // 🚌 CRUD DE VEHÍCULOS
    // ===============================
    Route::post('/vehiculo/store', [VehiculoController::class, 'store'])->name('vehiculo.store');
    Route::put('/vehiculo/{id}', [VehiculoController::class, 'update'])->name('vehiculo.update');
    Route::delete('/vehiculo/{id}', [VehiculoController::class, 'destroy'])->name('vehiculo.destroy');
});
