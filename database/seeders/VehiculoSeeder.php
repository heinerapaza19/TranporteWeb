<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vehiculos')->insert([
            // 🚍 EMPRESA 1 - San Román
            ['placa' => 'SRM-101', 'modelo' => 'Hyundai County', 'color' => 'Gris', 'capacidad' => 25, 'empresa_id' => 1],
            ['placa' => 'SRM-102', 'modelo' => 'Toyota Coaster', 'color' => 'Blanco', 'capacidad' => 25, 'empresa_id' => 1],
            ['placa' => 'SRM-103', 'modelo' => 'Mercedes Sprinter', 'color' => 'Gris', 'capacidad' => 20, 'empresa_id' => 1],
            ['placa' => 'SRM-104', 'modelo' => 'Nissan Civilian', 'color' => 'Blanco', 'capacidad' => 20, 'empresa_id' => 1],

            // 🚍 EMPRESA 2 - Línea 18
            ['placa' => 'L18-201', 'modelo' => 'Hyundai County', 'color' => 'Verde', 'capacidad' => 25, 'empresa_id' => 2],
            ['placa' => 'L18-202', 'modelo' => 'Toyota Coaster', 'color' => 'Verde', 'capacidad' => 25, 'empresa_id' => 2],
            ['placa' => 'L18-203', 'modelo' => 'Mercedes Sprinter', 'color' => 'Verde Oscuro', 'capacidad' => 20, 'empresa_id' => 2],
            ['placa' => 'L18-204', 'modelo' => 'Nissan Civilian', 'color' => 'Verde Claro', 'capacidad' => 20, 'empresa_id' => 2],

            // 🚍 EMPRESA 3 - Línea 22
            ['placa' => 'L22-301', 'modelo' => 'Hyundai County', 'color' => 'Azul', 'capacidad' => 25, 'empresa_id' => 3],
            ['placa' => 'L22-302', 'modelo' => 'Toyota Coaster', 'color' => 'Azul', 'capacidad' => 25, 'empresa_id' => 3],
            ['placa' => 'L22-303', 'modelo' => 'Mercedes Sprinter', 'color' => 'Celeste', 'capacidad' => 20, 'empresa_id' => 3],
            ['placa' => 'L22-304', 'modelo' => 'Nissan Civilian', 'color' => 'Azul Oscuro', 'capacidad' => 20, 'empresa_id' => 3],

            // 🚍 EMPRESA 4 - Línea 55
            ['placa' => 'L55-645', 'modelo' => 'Hyundai County', 'color' => 'Rojo', 'capacidad' => 25, 'empresa_id' => 4],
            ['placa' => 'L55-402', 'modelo' => 'Toyota Coaster', 'color' => 'Rojo', 'capacidad' => 25, 'empresa_id' => 4],
            ['placa' => 'L55-403', 'modelo' => 'Mercedes Sprinter', 'color' => 'Vino', 'capacidad' => 20, 'empresa_id' => 4],
            ['placa' => 'L55-404', 'modelo' => 'Nissan Civilian', 'color' => 'Rojo Oscuro', 'capacidad' => 20, 'empresa_id' => 4],
        ]);
    }
}
