<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // verificamos que exista la columna en la tabla de productos para eliminarla
        if(Schema::hasColumn('productos', 'categoria_id')){
            Schema::table('productos', function (Blueprint $table) {
                // solo eliminamos columna ya que no se genero la llave foranea
                $table->dropColumn('categoria_id');
            });
        }
        Schema::create('categoria_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();

            // creamos las llaves foraneas a sus respectivas tablas
            // agregamos un OnDelete en caso de que se elimine la categoria / producto y se elimine tambien el registro
            // evitar basura en la base de datos
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_producto');
    }
};
