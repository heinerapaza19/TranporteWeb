<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'color',
        'telefono',
        'direccion',
        'logo',
        'correo_login',
        'password_login',
    ];

    // 🔹 Relación con choferes
    public function choferes()
    {
        return $this->hasMany(Chofer::class);
    }

    // 🔹 Relación con vehículos
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
