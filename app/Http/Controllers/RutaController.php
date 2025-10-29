<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RutaController extends Controller
{
    public function mapa()
{
    // Coordenadas simuladas de las rutas de cada empresa
    $rutas = [
        [
            'empresa' => 'Empresa Naranja',
            'color' => 'orange',
            'coordenadas' => [
                [-15.514141, -70.178590],
                [-15.513955, -70.178440],
                [-15.513743, -70.176964],
                [-15.513687, -70.176208],
                [-15.513340, -70.173337],
                [-15.512193, -70.171170],
                [-15.510875, -70.169932],
                [-15.508181, -70.166010],
                [-15.503353, -70.159031],
            ],
            'descripcion' => 'Inicio de ruta - Zona Norte.',
        ],
        [
            'empresa' => 'Línea 55',
            'color' => 'green',
            'coordenadas' => [
                [-15.493, -70.153],
                [-15.496, -70.160],
                [-15.499, -70.165],
                [-15.502, -70.172],
                [-15.504, -70.179],
            ],
            'descripcion' => 'Ruta Este - Av. Circunvalación.',
        ],
        [
            'empresa' => 'Línea 22',
            'color' => 'blue',
            'coordenadas' => [
                [-15.511, -70.128],
                [-15.513, -70.135],
                [-15.514, -70.142],
                [-15.516, -70.150],
                [-15.520, -70.160],
            ],
            'descripcion' => 'Ruta Central - Mercado Túpac.',
        ],
        [
            'empresa' => 'Línea 18',
            'color' => 'red',
            'coordenadas' => [
                [-15.524, -70.145],
                [-15.519, -70.155],
                [-15.514, -70.165],
                [-15.509, -70.175],
                [-15.505, -70.185],
            ],
            'descripcion' => 'Ruta Sur - San Román.',
        ],
    ];

return view('rutas.mapa', compact('rutas'));

}

}