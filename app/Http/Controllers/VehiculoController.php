<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        // luego traeremos datos desde MySQL
        return view('vehiculo.vehiculo');
    }
}
