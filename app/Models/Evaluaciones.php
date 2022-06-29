<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
    use HasFactory;
    protected $fillable     =   ['producto_id', 'calificacion'];

    // Relacion de categoria a productos a travez de la tabla relacional
    public function producto() {
        return $this->hasOne(Productos::class,'id', 'producto_id');
    }
}
