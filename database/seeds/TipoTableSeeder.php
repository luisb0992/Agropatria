<?php

use Illuminate\Database\Seeder;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = array(
        			array('id' => '1','name' => 'MAQUINARIA, MUEBLES Y EQUIPOS DE OFICINA'),
				  	array('id' => '2','name' => 'MOBILIARIO Y ENSERES DE ALOJAMIENTO'),
				  	array('id' => '3','name' => 'MAQUINARIA, EQUIPO DE CONSTRUCCION, INDUSTRIA Y TALLER'),
				  	array('id' => '4','name' => 'INDUSTRIA Y TALLER'),
				  	array('id' => '5','name' => 'EQUIPOS DE TELECOMUNICACIONES'),
				  	array('id' => '6','name' => 'EQUIPOS DE COMPUTACION'),
				  	array('id' => '7','name' => 'EQUIPOS CIENTIFICOS Y DE ENSEÑANZA'),
				  	array('id' => '8','name' => 'EQUIPOS MEDICOS Y VETERINARIOS'),
				  	array('id' => '9','name' => 'EQUIPOS DE TRANSPORTE'),
				  	array('id' => '10','name' => 'EQUIPO DE CONSTRUCCION'),
				  	array('id' => '11','name' => 'EQUIPOS DE OFICINA'),
				  	array('id' => '12','name' => 'EDIFICIOS, TERRENOS E INSTALACIONES'),
				  	array('id' => '13','name' => 'ARMAMENTO Y EQIUPO DE DEFENZA'),
		);
        //insert manual a una base de datos con array
        \DB::table('tipos')->insert($tipo);
    }
}
