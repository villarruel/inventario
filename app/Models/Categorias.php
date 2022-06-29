<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $fillable     =   ['nombre'];

    // Relacion de categoria a productos a travez de la tabla relacional
    public function productos() {
        return $this->belongsToMany(Productos::class,'categoria_producto', 'categoria_id', 'producto_id');
    }
}
