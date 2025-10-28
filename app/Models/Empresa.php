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

    // Relaciones
    public function choferes()
    {
        return $this->hasMany(Chofer::class);
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }

    public function rutas()
    {
        return $this->hasMany(Ruta::class);
    }
}
