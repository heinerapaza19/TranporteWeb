<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $fillable = ['vehiculo_id', 'latitud', 'longitud', 'velocidad', 'fecha_hora'];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
