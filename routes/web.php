<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\EmpresaAuthController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\MicroController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\RutaController;



// ===============================
// 🌐 PÁGINAS PÚBLICAS
// ===============================

// Página principal (puedes poner dashboard o portada pública)
Route::get('/', function () {
    return view('dashboard');
});

// Vista pública para pasajeros: solo consulta de vehículos
Route::get('/vehiculo', [VehiculoController::class, 'index'])->name('vehiculo.index');

// 👤 Panel general de usuario (si luego agregas login normal de usuarios)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ===============================
// 🧩 PANEL DEL ADMINISTRADOR GENERAL
// ===============================
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// ===============================
// 🚀 LOGIN DE EMPRESAS
// ===============================

// Mostrar formulario de login de empresa
Route::get('/empresa/login', [EmpresaAuthController::class, 'showLogin'])->name('empresa.login');

// Procesar login de empresa
Route::post('/empresa/login', [EmpresaAuthController::class, 'login'])->name('empresa.login.post');

// ===============================
// 🔐 RUTAS PROTEGIDAS (solo empresa logueada)
// ===============================
Route::middleware('empresa.auth')->group(function () {

    // 📊 Panel privado de empresa
    Route::get('/empresa/dashboard', [EmpresaAuthController::class, 'dashboard'])
        ->name('empresa.dashboard');

    // 🚪 Cerrar sesión de empresa
    Route::get('/empresa/logout', [EmpresaAuthController::class, 'logout'])
        ->name('empresa.logout');

    // ===============================
    // 🧾 CRUD DE CHOFERES
    // ===============================
    Route::post('/chofer/store', [ChoferController::class, 'store'])
        ->name('chofer.store');

    Route::put('/chofer/{id}', [ChoferController::class, 'update'])
        ->name('chofer.update');

    Route::delete('/chofer/{id}', [ChoferController::class, 'destroy'])
        ->name('chofer.destroy');

    // ===============================
    // 🚌 CRUD DE VEHÍCULOS (solo empresa)
    // ===============================
    Route::post('/vehiculo/store', [VehiculoController::class, 'store'])
        ->name('vehiculo.store');

    Route::put('/vehiculo/{id}', [VehiculoController::class, 'update'])
        ->name('vehiculo.update');

    Route::delete('/vehiculo/{id}', [VehiculoController::class, 'destroy'])
        ->name('vehiculo.destroy');
});

//informaion 
Route::get('/empresa/naranja', [EmpresaController::class, 'naranja'])->name('empresa.naranja');
Route::get('/empresa/18', [EmpresaController::class, 'linea18'])->name('empresa.18');
Route::get('/empresa/55', [EmpresaController::class, 'linea55'])->name('empresa.55');
Route::get('/empresa/22', [EmpresaController::class, 'linea22'])->name('empresa.22');

//rutas de las empresas 
Route::get('/rutas/mapa', [RutaController::class, 'mapa'])->name('rutas.mapa');




// ===============================
// 🚐 MICROS (versión pública o admin)
// ===============================
Route::get('/micro', [MicroController::class, 'index'])->name('micro.index');


// ===============================
// 🗺️ MAPA DE RUTAS (público)
// ===============================

// 🟦 Vista específica para la Línea 18
Route::get('/mapa/18', function () {
    return view('mapas.linea18'); // resources/views/mapas/linea18.blade.php
})->name('mapa.linea18');

// 🟧 Vista específica para Empresa Naranja
Route::get('/mapa/naranja', function () {
    return view('mapas.naranja'); // resources/views/mapas/naranja.blade.php
})->name('mapa.naranja');

// 🟩 Vista específica para la Línea 22
Route::get('/mapa/22', function () {
    return view('mapas.linea22');
})->name('mapa.22');

// ===============================
// 🟢 MAPA LÍNEA 55
// ===============================
Route::get('/mapa/55', function () {
    return view('mapas.linea55');
})->name('mapa.55');
