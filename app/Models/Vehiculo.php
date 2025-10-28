<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'modelo',
        'color',
        'capacidad',
        'revision_tecnica',
        'soat',
        'empresa_id',
        'chofer_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }
    protected $with = ['empresa', 'chofer'];

}
