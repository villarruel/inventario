<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductosFactory extends Factory
{
    public function definition(){
        //Valores del enum estado
        $estados    =   ['con inventario', 'sin inventario'];
        return [
            'sku' => fake()->lexify(),
            'nombre' => fake()->name(),
            'descripcion' => fake()->text(), // password
            'precio' => fake()->randomFloat(2),
            'cantidad' => fake()->randomNumber(5, false),
            'estado' => $estados[rand(0,1)],
        ];
    }
}
