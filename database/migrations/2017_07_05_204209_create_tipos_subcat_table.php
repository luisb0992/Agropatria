<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposSubcatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_subcat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('descripcion');
            $table->integer('sub_categoria_id')->unsigned();
            $table->foreign('sub_categoria_id')->references('id')->on('sub_categorias')->onDelete('cascade');
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
        Schema::dropIfExists('tipos_subcat');
    }
}
