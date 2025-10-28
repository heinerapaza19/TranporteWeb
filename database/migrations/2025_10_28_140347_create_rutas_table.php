<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->string('color', 30)->nullable();
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rutas');
    }
};
