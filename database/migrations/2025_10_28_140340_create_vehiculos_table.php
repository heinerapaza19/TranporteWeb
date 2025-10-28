<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
    $table->id();
    $table->string('placa', 10)->unique();
    $table->string('modelo', 100)->nullable();
    $table->string('color', 30)->nullable(); // Ej: "Blanco"
    $table->integer('capacidad')->default(0);
    $table->enum('revision_tecnica', ['Vigente', 'Vencida', 'Por vencer'])->default('Vigente');
    $table->enum('soat', ['Vigente', 'Vencido', 'Por vencer'])->default('Vigente');
    $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
    $table->foreignId('chofer_id')->nullable()->constrained('choferes')->onDelete('set null');
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
