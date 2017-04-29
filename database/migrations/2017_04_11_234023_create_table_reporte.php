<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('reportes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();;
            $table->integer('producto_id')->unsigned();


            $table->foreign('user_id')->references("id")->on("users");
            $table->foreign('producto_id')->references("id")->on("productos");
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
        Schema::dropIfExists('reportes');
    }
}
