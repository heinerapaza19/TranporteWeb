<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function naranja()
    {
        // Aquí podrías traer los datos desde BD si lo deseas.
        $empresa = [
            'nombre' => 'Empresa de Transporte Naranja',
            'zona' => 'Zona Norte - Juliaca',
            'micros' => 12,
            'choferes' => 10,
            'rutas_activas' => 5,
            'telefono' => '(051) 123456',
            'email' => 'contacto@naranja.pe',
            'direccion' => 'Av. Circunvalación N° 123, Juliaca',
            'estado' => 'Operativo',
            'logo' => '/logo/naranja.png'
        ];

        return view('empresa.naranja', compact('empresa'));
    }

    public function linea18()
{
    $empresa = [
        'nombre' => 'Empresa de Transporte Línea 18',
        'zona' => 'Zona Sur - Juliaca',
        'micros' => 10,
        'choferes' => 8,
        'rutas_activas' => 4,
        'telefono' => '(051) 876543',
        'email' => 'contacto@linea18.pe',
        'direccion' => 'Av. Tacna N° 456, Juliaca',
        'estado' => 'Operativo',
        'logo' => '/logos/18.jpg'
    ];

    return view('empresa.linea18', compact('empresa'));
}
public function linea55()
{
    $empresa = [
        'nombre' => 'Empresa de Transporte Línea 55',
        'zona' => 'Zona Este - Juliaca',
        'micros' => 8,
        'choferes' => 7,
        'rutas_activas' => 3,
        'telefono' => '(051) 987654',
        'email' => 'contacto@linea55.pe',
        'direccion' => 'Av. San Román N° 222, Juliaca',
        'estado' => 'Operativo',
        'logo' => '/logos/55.jpg'
    ];

    return view('empresa.linea55', compact('empresa'));
}
public function linea22()
{
    $empresa = [
        'nombre' => 'Empresa de Transporte Línea 22',
        'zona' => 'Zona Centro - Juliaca',
        'micros' => 10,
        'choferes' => 9,
        'rutas_activas' => 4,
        'telefono' => '(051) 912345',
        'email' => 'contacto@linea22.pe',
        'direccion' => 'Av. Tacna N° 890, Juliaca',
        'estado' => 'Operativo',
        'logo' => '/logos/22.jpg'
    ];

    return view('empresa.linea22', compact('empresa'));
}



}
