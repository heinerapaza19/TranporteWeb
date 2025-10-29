<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chofer extends Authenticatable
{
    use HasFactory;

    protected $table = 'choferes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'licencia',
        'telefono',
        'email',
        'password',
        'ruta_asignada',
        'estado_licencia',
        'educacion_vial',
        'empresa_id',
    ];

    /**
     * 🚍 Un chofer pertenece a una empresa
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    /**
     * 🚐 Un chofer tiene un vehículo asignado
     */
    public function vehiculo()
    {
        return $this->hasOne(Vehiculo::class, 'chofer_id');
    }
}
