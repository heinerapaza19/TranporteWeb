<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;

    //  Esto le dice a Laravel que use la tabla 'choferes'
    protected $table = 'choferes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'telefono',
        'ruta_asignada',
        'licencia',
        'estado_licencia',
        'educacion_vial',
        'empresa_id',
    ];

    // 🔁 Relaciones
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
