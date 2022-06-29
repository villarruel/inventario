<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable     =   ['categoria_id', 'nombre', 'descripcion', 'precio', 'cantidad', 'estado'];

    // Relacion de producto a categorias a travez de la tabla relacional
    public function categorias() {
        return $this->belongsToMany(Categorias::class,'categoria_producto', 'producto_id', 'categoria_id');
    }

    public function calificaciones() {
        return $this->hasMany(Evaluaciones::class,'producto_id', 'id');
    }
}
