<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('correo')->unique();
            $table->string('password');
            $table->enum('rol', ['admin', 'chofer', 'cliente'])->default('cliente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
