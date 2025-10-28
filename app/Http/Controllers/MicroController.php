<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class MicroController extends Controller
{
    /**
     * Mostrar todos los micros de todas las empresas (modo administrador)
     */
    public function index()
    {
        // Trae todos los vehículos junto con su chofer y empresa
        $micros = Vehiculo::with(['chofer', 'empresa'])->get();
        return view('vehiculo.vehiculo', compact('micros'));
    }
}
