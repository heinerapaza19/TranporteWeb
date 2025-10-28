<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // 1️⃣ Primero las empresas
            EmpresaSeeder::class,

            // 2️⃣ Luego los choferes (dependen de empresas)
            ChoferSeeder::class,

            // 3️⃣ Luego los vehículos (dependen de choferes y empresas)
            VehiculoSeeder::class,

            // 4️⃣ Finalmente los usuarios (admin, cliente, etc.)
            UsuarioSeeder::class,
        ]);
    }
}
