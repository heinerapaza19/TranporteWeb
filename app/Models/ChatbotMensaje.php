<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotMensaje extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'pregunta', 'respuesta', 'fecha_hora'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
