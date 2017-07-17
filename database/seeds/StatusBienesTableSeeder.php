<?php

use Illuminate\Database\Seeder;

class StatusBienesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $status = array(
			array('id' => '1','name' => 'USO'),
	        array('id' => '2','name' => 'COMODATO'),
	        array('id' => '3','name' => 'ARRENDAMIENTO'),
	        array('id' => '4','name' => 'MANTENIMIENTO'),
            array('id' => '5','name' => 'REPARACION'),
            array('id' => '6','name' => 'PROCESO DE DISPOSICION'),
            array('id' => '7','name' => 'DESUSO POR OBSOLENCIA'),
            array('id' => '8','name' => 'DESUSO POR INSERVIBILIDAD'),
            array('id' => '9','name' => 'DESUSO POR OBSOLENCIA E INSERVIBILIDAD'),
            array('id' => '10','name' => 'DESUSO POR ALMACEN O DEPOSITO PARA SU ASIGNACION'),
	        array('id' => '11','name' => 'OTRO USO')
		);
        //insert manual a una base de datos con array
        \DB::table('status_bienes')->insert($status);
    }
}
