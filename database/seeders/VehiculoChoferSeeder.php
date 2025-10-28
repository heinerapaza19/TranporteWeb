<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculoChoferSeeder extends Seeder
{
    public function run(): void
    {
        // EMPRESA 1 - San Román
        DB::table('vehiculos')->where('placa', 'SRM-101')->update(['chofer_id' => 1]);
        DB::table('vehiculos')->where('placa', 'SRM-102')->update(['chofer_id' => 2]);
        DB::table('vehiculos')->where('placa', 'SRM-103')->update(['chofer_id' => 3]);
        DB::table('vehiculos')->where('placa', 'SRM-104')->update(['chofer_id' => 4]);

        // EMPRESA 2 - Línea 18
        DB::table('vehiculos')->where('placa', 'L18-201')->update(['chofer_id' => 5]);
        DB::table('vehiculos')->where('placa', 'L18-202')->update(['chofer_id' => 6]);
        DB::table('vehiculos')->where('placa', 'L18-203')->update(['chofer_id' => 7]);
        DB::table('vehiculos')->where('placa', 'L18-204')->update(['chofer_id' => 8]);

        // EMPRESA 3 - Línea 22
        DB::table('vehiculos')->where('placa', 'L22-301')->update(['chofer_id' => 9]);
        DB::table('vehiculos')->where('placa', 'L22-302')->update(['chofer_id' => 10]);
        DB::table('vehiculos')->where('placa', 'L22-303')->update(['chofer_id' => 11]);
        DB::table('vehiculos')->where('placa', 'L22-304')->update(['chofer_id' => 12]);

        // EMPRESA 4 - Línea 55
        DB::table('vehiculos')->where('placa', 'L55-645')->update(['chofer_id' => 13]);
        DB::table('vehiculos')->where('placa', 'L55-402')->update(['chofer_id' => 14]);
        DB::table('vehiculos')->where('placa', 'L55-403')->update(['chofer_id' => 15]);
        DB::table('vehiculos')->where('placa', 'L55-404')->update(['chofer_id' => 16]);
    }
}
