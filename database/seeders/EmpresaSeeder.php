<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpresaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('empresas')->insert([
            [
                'nombre' => 'San Román',
                'color' => 'naranja',
                'telefono' => '951000111',
                'direccion' => 'Av. Circunvalación',
                'logo' => 'logos/san_roman.png',
                'correo_login' => 'sanroman@transporte.com',
                'password_login' => Hash::make('sanroma25'),
            ],
            [
                'nombre' => 'Línea 18',
                'color' => 'verde',
                'telefono' => '951000112',
                'direccion' => 'Av. Tacna',
                'logo' => 'logos/linea18.png',
                'correo_login' => 'linea18@transporte.com',
                'password_login' => Hash::make('linea18'),
            ],
            [
                'nombre' => 'Línea 22',
                'color' => 'azul',
                'telefono' => '951000113',
                'direccion' => 'Av. San Martín',
                'logo' => 'logos/linea22.png',
                'correo_login' => 'linea22@transporte.com',
                'password_login' => Hash::make('linea22'),
            ],
            [
                'nombre' => 'Línea 55',
                'color' => 'rojo',
                'telefono' => '951000114',
                'direccion' => 'Av. Collasuyo',
                'logo' => 'logos/linea55.png',
                'correo_login' => 'linea55@transporte.com',
                'password_login' => Hash::make('linea55'),
            ],
        ]);
    }
}
