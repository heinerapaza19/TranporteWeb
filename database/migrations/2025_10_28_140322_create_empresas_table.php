<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('color', 30)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('direccion')->nullable();

            //  Campos nuevos añadidos
            $table->string('logo')->nullable(); // ruta o nombre del archivo del logo
            $table->string('correo_login', 150)->unique(); // correo para login de empresa
            $table->string('password_login'); // contraseña encriptada para login

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
