<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_mensajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->nullable()->constrained('usuarios')->onDelete('set null');
            $table->string('pregunta', 255);
            $table->text('respuesta')->nullable();
            $table->timestamp('fecha_hora')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_mensajes');
    }
};
