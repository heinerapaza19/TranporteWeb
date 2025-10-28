<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paraderos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->decimal('latitud', 10, 6);
            $table->decimal('longitud', 10, 6);
            $table->foreignId('ruta_id')->constrained('rutas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paraderos');
    }
};
