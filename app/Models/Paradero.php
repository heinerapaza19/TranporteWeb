<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paradero extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'latitud', 'longitud', 'ruta_id'];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }
}
