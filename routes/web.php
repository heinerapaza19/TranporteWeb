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
use App\Http\Controllers\ChoferAuthController;
use App\Http\Controllers\ChatBotController;


/*
|--------------------------------------------------------------------------
| 🌐 RUTAS PÚBLICAS
|--------------------------------------------------------------------------
| Dashboard principal y vistas públicas (sin login)
*/
Route::get('/', fn() => view('dashboard'));
Route::get('/vehiculo', [VehiculoController::class, 'index'])->name('vehiculo.index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

/*
|--------------------------------------------------------------------------
| 🏢 LOGIN Y PANEL DE EMPRESAS
|--------------------------------------------------------------------------
| Cada empresa inicia sesión, gestiona sus choferes y vehículos.
*/
Route::get('/empresa/login', [EmpresaAuthController::class, 'showLogin'])->name('empresa.login');
Route::post('/empresa/login', [EmpresaAuthController::class, 'login'])->name('empresa.login.post');

/*
|---------------------------------------------------------------------------
| 🧱 RUTAS PROTEGIDAS (solo empresa autenticada)
|---------------------------------------------------------------------------
*/
Route::middleware(['empresa.auth'])->group(function () {
    Route::get('/empresa/dashboard', [EmpresaAuthController::class, 'dashboard'])->name('empresa.dashboard');
    Route::get('/empresa/logout', [EmpresaAuthController::class, 'logout'])->name('empresa.logout');

    Route::post('/chofer/store', [ChoferController::class, 'store'])->name('chofer.store');
    Route::put('/chofer/{id}', [ChoferController::class, 'update'])->name('chofer.update');
    Route::delete('/chofer/{id}', [ChoferController::class, 'destroy'])->name('chofer.destroy');

    Route::post('/vehiculo/store', [VehiculoController::class, 'store'])->name('vehiculo.store');
    Route::put('/vehiculo/{id}', [VehiculoController::class, 'update'])->name('vehiculo.update');
    Route::delete('/vehiculo/{id}', [VehiculoController::class, 'destroy'])->name('vehiculo.destroy');
});


/*
|--------------------------------------------------------------------------
| 🚌 EMPRESAS Y RUTAS PÚBLICAS
|--------------------------------------------------------------------------
| Páginas visibles sin login (mapas por línea)
*/
Route::get('/empresa/naranja', [EmpresaController::class, 'naranja'])->name('empresa.naranja');
Route::get('/empresa/18', [EmpresaController::class, 'linea18'])->name('empresa.18');
Route::get('/empresa/22', [EmpresaController::class, 'linea22'])->name('empresa.22');
Route::get('/empresa/55', [EmpresaController::class, 'linea55'])->name('empresa.55');
Route::get('/rutas/mapa', [RutaController::class, 'mapa'])->name('rutas.mapa');

/*
|--------------------------------------------------------------------------
| 👨‍✈️ LOGIN Y PANEL DE CHOFERES
|--------------------------------------------------------------------------
| Cada chofer tiene su propio acceso protegido por guard 'chofer'
*/
Route::get('/login', fn() => redirect()->route('chofer.login'))->name('login');
Route::get('/chofer/login', [ChoferAuthController::class, 'showLoginForm'])->name('chofer.login');
Route::post('/chofer/login', [ChoferAuthController::class, 'login'])->name('chofer.login.post');
Route::post('/chofer/logout', [ChoferAuthController::class, 'logout'])->name('chofer.logout');

/*
|--------------------------------------------------------------------------
| 🧱 RUTAS PROTEGIDAS (solo chofer autenticado)
|--------------------------------------------------------------------------
| Usan middleware auth:chofer (guard configurado en config/auth.php)
*/
Route::middleware('auth:chofer')->group(function () {
    Route::get('/chofer/perfil', [ChoferController::class, 'perfil'])->name('chofer.perfil');
    Route::get('/chofer/dashboard', [ChoferController::class, 'index'])->name('chofer.dashboard');
});

/*
|--------------------------------------------------------------------------
| 🗺️ MAPAS Y MICROS
|--------------------------------------------------------------------------
| Vistas generales de rutas y micros
*/
Route::get('/micro', [MicroController::class, 'index'])->name('micro.index');
Route::get('/mapa/18', fn() => view('mapas.linea18'))->name('mapa.linea18');
Route::get('/mapa/naranja', fn() => view('mapas.naranja'))->name('mapa.naranja');
Route::get('/mapa/22', fn() => view('mapas.linea22'))->name('mapa.22');
Route::get('/mapa/55', fn() => view('mapas.linea55'))->name('mapa.55');

// 🤖 Chatbot
Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/store', [ChatbotController::class, 'store'])->name('chatbot.store');
Route::get('/chatbot/historial', [ChatbotController::class, 'historial'])->name('chatbot.historial');


Route::view('/mapa-general', 'mapas.mapa_general')->name('mapa.general');

/*
Route::post('/chatbot/responder', [ChatBotController::class, 'responder'])->name('chatbot.responder');

use Illuminate\Support\Facades\Http;

Route::get('/test-openai', function () {
    $apiKey = env('OPENAI_API_KEY');
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apiKey,
        'Content-Type' => 'application/json',
    ])->post('https://api.openai.com/v1/chat/completions', [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => 'Di "Hola Juliaca" si esto funciona.']
        ],
    ]);

    return $response->json();
});*/


