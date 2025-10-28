<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->decimal('latitud', 10, 6);
            $table->decimal('longitud', 10, 6);
            $table->decimal('velocidad', 5, 2)->nullable();
            $table->timestamp('fecha_hora')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
