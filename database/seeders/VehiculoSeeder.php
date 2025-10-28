<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vehiculos')->insert([
            // 🚘 Empresa 1 – San Román
            [
                'placa' => 'SRM-101',
                'modelo' => 'Hyundai County',
                'color' => 'Blanco',
                'capacidad' => 30,
                'revision_tecnica' => 'Vigente',
                'soat' => 'Vigente',
                'empresa_id' => 1,
                'chofer_id' => 1,
            ],
            [
                'placa' => 'SRM-102',
                'modelo' => 'Toyota Coaster',
                'color' => 'Naranja',
                'capacidad' => 28,
                'revision_tecnica' => 'Vigente',
                'soat' => 'Por vencer',
                'empresa_id' => 1,
                'chofer_id' => null,
            ],
            [
                'placa' => 'SRM-103',
                'modelo' => 'Mercedes Sprinter',
                'color' => 'Gris',
                'capacidad' => 32,
                'revision_tecnica' => 'Por vencer',
                'soat' => 'Vigente',
                'empresa_id' => 1,
                'chofer_id' => null,
            ],
            [
                'placa' => 'SRM-104',
                'modelo' => 'Nissan Civilian',
                'color' => 'Blanco',
                'capacidad' => 25,
                'revision_tecnica' => 'Vigente',
                'soat' => 'Vencido',
                'empresa_id' => 1,
                'chofer_id' => null,
            ],

            // 🚐 Empresa 2 – Línea 18
            [
                'placa' => 'L18-201',
                'modelo' => 'Hyundai County',
                'color' => 'Verde',
                'capacidad' => 29,
                'revision_tecnica' => 'Vigente',
                'soat' => 'Vigente',
                'empresa_id' => 2,
                'chofer_id' => 2,
            ],
            [
                'placa' => 'L18-202',
                'modelo' => 'Toyota Coaster',
                'color' => 'Verde',
                'capacidad' => 28,
                'revision_tecnica' => 'Por vencer',
                'soat' => 'Vigente',
                'empresa_id' => 2,
                'chofer_id' => null,
            ],
            [
                'placa' => 'L18-203',
                'modelo' => 'Mercedes Sprinter',
                'color' => 'Verde Oscuro',
                'capacidad' => 31,
                'revision_tecnica' => 'Vigente',
                'soat' => 'Por vencer',
                'empresa_id' => 2,
                'chofer_id' => null,
            ],
            [
                'placa' => 'L18-204',
                'modelo' => 'Nissan Civilian',
                'color' => 'Verde Claro',
                'capacidad' => 27,
                'revision_tecnica' => 'Vencida',
                'soat' => 'Vencido',
                'empresa_id' => 2,
                'chofer_id' => null,
            ],

            // 🚍 Empresa 3 – Línea 22
            [
                'placa' => 'L22-301',
                'modelo' => 'Hyundai County',
                'color' => 'Azul',
                'capacidad' => 30,
                'revision_tecnica' => 'Vigente',
                'soat' => 'Vigente',
                'empresa_id' => 3,
                'chofer_id' => 3,
            ],
            [
                'placa' => 'L22-302',
                'modelo' => 'Toyota Coaster',
                'color' => 'Azul',
                'capacidad' => 28,
                'revision_tecnica' => 'Por vencer',
                'soat' => 'Vigente',
                'empresa_id' => 3,
                'chofer_id' => null,
            ],
            [
                'placa' => 'L22-303',
                'modelo' => 'Mercedes Sprinter',
                'color' => 'Celeste',
                'capacidad' => 31,
                'revision_tecnica' => 'Vigente',
                'soat' => 'Por vencer',
                'empresa_id' => 3,
                'chofer_id' => null,
            ],
            [
                'placa' => 'L22-304',
                'modelo' => 'Nissan Civilian',
                'color' => 'Azul Oscuro',
                'capacidad' => 26,
                'revision_tecnica' => 'Vencida',
                'soat' => 'Vencido',
                'empresa_id' => 3,
                'chofer_id' => null,
            ],

            // 🚌 Empresa 4 – Línea 55
            [
                'placa' => 'L55-401',
                'modelo' => 'Hyundai County',
                'color' => 'Rojo',
                'capacidad' => 30,
                'revision_tecnica' => 'Vigente',
                'soat' => 'Vigente',
                'empresa_id' => 4,
                'chofer_id' => 4,
            ],
            [
                'placa' => 'L55-402',
                'modelo' => 'Toyota Coaster',
                'color' => 'Rojo',
                'capacidad' => 28,
                'revision_tecnica' => 'Vigente',
                'soat' => 'Por vencer',
                'empresa_id' => 4,
                'chofer_id' => null,
            ],
            [
                'placa' => 'L55-403',
                'modelo' => 'Mercedes Sprinter',
                'color' => 'Vino',
                'capacidad' => 32,
                'revision_tecnica' => 'Por vencer',
                'soat' => 'Vigente',
                'empresa_id' => 4,
                'chofer_id' => null,
            ],
            [
                'placa' => 'L55-404',
                'modelo' => 'Nissan Civilian',
                'color' => 'Rojo Oscuro',
                'capacidad' => 27,
                'revision_tecnica' => 'Vencida',
                'soat' => 'Vencido',
                'empresa_id' => 4,
                'chofer_id' => null,
            ],
        ]);
    }
}
