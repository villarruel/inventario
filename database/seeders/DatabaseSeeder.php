<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\CategoriaProducto;
use App\Models\Evaluaciones;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // declaramos una variable para obtener los ids de productos insertados
        $productos_ids                  =   [];
        $x                              =   0;
        // iteramos hasta que se inserten 200 productos
        while( $x<200){
            try{
                $producto               =   Productos::factory()->create();
                $x++;
                // almacenamos en el arreglo los ids
                array_push($productos_ids, $producto->id);
            }catch(\Illuminate\Database\QueryException $e){
                // en caso de que de un error de base de datos ignoramos
                continue;
            }
        }

        $categorias_ids                 =   [];
        $y  = 0;
        // iteramos hasta que se inserten 200 productos
        while( $y<15){
            try{
                $y++;
                $categoria              =   Categorias::factory()->create();
                // almacenamos en el arreglo los ids
                array_push($categorias_ids, $categoria->id);
            }catch(\Illuminate\Database\QueryException $e){
                // en caso de que de un error de base de datos ignoramos
                continue;
            }
        }
        
        // poblamos la tabla relacional categoria_producto; puede que no todos los productos puedan tener categoria
        $z                              =   0;
        while( $z<200){
            $z++;
            try{
                $registro               =   [
                                                'categoria_id'=>array_rand($categorias_ids), 
                                                'producto_id'=>array_rand($productos_ids)
                                            ];
                CategoriaProducto::create($registro);
                
            }catch(\Illuminate\Database\QueryException $e){
                // en caso de que de un error de base de datos ignoramos
                continue;
            }
        }

        // insertamos evaluaciones para los productos
        $zz                              =   0;
        while( $zz<100){
            $zz++;
            try{
                $registro               =   [
                                                'producto_id'=>array_rand($productos_ids),
                                                'calificacion'=>rand(1,5)
                                            ];
                Evaluaciones::create($registro);
                
            }catch(\Illuminate\Database\QueryException $e){
                // en caso de que de un error de base de datos ignoramos
                continue;
            }
        }
    }
}
