<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'color', 'empresa_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function paraderos()
    {
        return $this->hasMany(Paradero::class);
    }
}
