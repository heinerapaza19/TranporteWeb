<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('choferes', function (Blueprint $table) {
        $table->id();
        $table->string('nombres', 100);
        $table->string('apellidos', 100);
        $table->string('dni', 10)->unique();
        $table->string('licencia', 20)->nullable();
        $table->string('telefono', 20)->nullable();
        $table->string('ruta_asignada', 100)->nullable(); // Ej: "Ruta 1 - Central"

        // ✅ Acepta 3 valores para evitar errores
        $table->enum('estado_licencia', ['Activa', 'Inactiva', 'Pendiente'])->default('Activa');

        $table->enum('educacion_vial', ['Aprobado', 'Pendiente', 'Reprobado'])->default('Pendiente');

        $table->foreignId('empresa_id')
              ->constrained('empresas')
              ->onDelete('cascade');

        $table->timestamps();
    });
}

};
