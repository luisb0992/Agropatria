<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula')->unique();
            $table->string('name');
            $table->string('ape');
            $table->string('email',190)->unique();
            $table->string('direccion')->nullable();
            $table->integer('perfil_id')->unsigned();
            $table->string('password');
            $table->boolean('status');
            
            $table->foreign("perfil_id")->references("id")->on("perfiles");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
