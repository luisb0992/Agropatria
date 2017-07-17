<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBienes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes', function(Blueprint $table){
            $table->increments('id');
            $table->string('etiqueta');
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references("id")->on("departamentos")->onDelete('cascade');
            $table->integer('ubicacion_exacta_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references("id")->on("categorias")->onDelete('cascade');
            $table->integer('sub_categoria_id')->unsigned();
            $table->integer('tipo_subcat_id')->unsigned();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('serial')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('status_bienes_id')->unsigned();
            $table->foreign('status_bienes_id')->references("id")->on("status_bienes")->onDelete('cascade');
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
        Schema::dropIfExists('bienes');
    }
}
