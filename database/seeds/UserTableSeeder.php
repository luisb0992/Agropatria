<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = array(
				  array('id' => '1',
				  		'cedula' => '12345678',
				  		'name' => 'admin', 
				  		'ape' => 'admin', 
				  		'direccion' => 'vacio', 
				  		'email' => 'admin@admin.com', 
				  		'perfil_id' => 1, 
				  		'password' => bcrypt('admin'), 
				  		'status' => 1),
				  
				  array('id' => '2',
				  		'cedula' => '123456',
				  		'name' => 'user', 
				  		'ape' => 'user',
				  		'direccion' => 'vacio', 
				  		'email' => 'usuario@usuario.com', 
				  		'perfil_id' => 2, 
				  		'password' => bcrypt('usuario'), 
				  		'status' => 1),
				);
        //insert manual a una base de datos con array
        \DB::table('users')->insert($user);
    }
}
