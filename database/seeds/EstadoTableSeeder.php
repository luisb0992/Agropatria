<?php

use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = array(
				  array('id' => '1','name' => 'DTTO. CAPITAL'),
				  array('id' => '2','name' => 'ANZOATEGUI'),
				  array('id' => '3','name' => 'APURE'),
				  array('id' => '4','name' => 'ARAGUA'),
				  array('id' => '5','name' => 'BARINAS'),
				  array('id' => '6','name' => 'BOLIVAR'),
				  array('id' => '7','name' => 'CARABOBO'),
				  array('id' => '8','name' => 'COJEDES'),
				  array('id' => '9','name' => 'FALCON'),
				  array('id' => '10','name' => 'GUARICO'),
				  array('id' => '11','name' => 'LARA'),
				  array('id' => '12','name' => 'MERIDA'),
				  array('id' => '13','name' => 'MIRANDA'),
				  array('id' => '14','name' => 'MONAGAS'),
				  array('id' => '15','name' => 'NUEVA ESPARTA'),
				  array('id' => '16','name' => 'PORTUGUESA'),
				  array('id' => '17','name' => 'SUCRE'),
				  array('id' => '18','name' => 'TACHIRA'),
				  array('id' => '19','name' => 'TRUJILLO'),
				  array('id' => '20','name' => 'YARACUY'),
				  array('id' => '21','name' => 'ZULIA'),
				  array('id' => '22','name' => 'AMAZONAS'),
				  array('id' => '23','name' => 'DELTA AMACURO'),
				  array('id' => '24','name' => 'VARGAS')
				);
        //insert manual a una base de datos con array
        \DB::table('estados')->insert($estado);
    }
}
