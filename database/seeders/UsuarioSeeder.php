<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Administrador General',
                'correo' => 'admin@transporte.com',
                'password' => Hash::make('admin123'),
                'rol' => 'admin',
            ],
            [
                'nombre' => 'Juan Mamani',
                'correo' => 'chofer1@transporte.com',
                'password' => Hash::make('chofer123'),
                'rol' => 'chofer',
            ],
            [
                'nombre' => 'Carlos Quispe',
                'correo' => 'chofer2@transporte.com',
                'password' => Hash::make('chofer123'),
                'rol' => 'chofer',
            ],
            [
                'nombre' => 'Cliente Demo',
                'correo' => 'cliente@transporte.com',
                'password' => Hash::make('cliente123'),
                'rol' => 'cliente',
            ],
        ]);
    }
}
