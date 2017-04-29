<?php

use Illuminate\Database\Seeder;

class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfil = array(
				  array('id' => '1','name' => 'ADMINISTRADOR'),
				  array('id' => '2','name' => 'USUARIO')
				);
        //insert manual a una base de datos con array
        \DB::table('perfiles')->insert($perfil);
    }
}
