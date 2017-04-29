<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function(Blueprint $table){
            $table->increments('id');
            $table->string('etiqueta');
            $table->string('empresa');
            $table->integer('estado_id')->unsigned();
            $table->integer('ubicacion_id')->unsigned();
            $table->integer('tipo_id')->unsigned();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('serial')->nullable();
            $table->integer('material_id')->unsigned();
            $table->string('descripcion')->nullable();
            $table->boolean('status');

            $table->foreign('estado_id')->references("id")->on("estados");
            $table->foreign('material_id')->references("id")->on("materiales");
            $table->foreign('tipo_id')->references("id")->on("tipos");
            $table->foreign('ubicacion_id')->references("id")->on("ubicaciones");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
