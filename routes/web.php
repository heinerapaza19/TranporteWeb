<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

// Página principal -> Dashboard AdminLTE
Route::get('/', function () {
    return view('dashboard');
});

// Rutas de autenticación (login, registro, etc.)
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
