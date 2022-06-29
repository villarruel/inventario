<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migracion de la tabla de productos
     *
     * La tabla de productos tiene categoria_id, pero posteriormente se generará la llave foranea y una estructura nueva
     * para generar la relacion N:N
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->string('sku',20)->unique()->index();
            $table->string('nombre')->index();
            $table->text('descripcion')->nullable();
            $table->decimal('precio',18,6)->default(0);
            $table->integer('cantidad')->unsigned()->default(0);
            $table->enum('estado',['con inventario','sin inventario'])->default('con inventario')->index();
            $table->timestamps();

            
        });
    }

    /**
     * Reversa de la migracion
     *
     * 
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
