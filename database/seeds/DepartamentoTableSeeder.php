<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento = array(
			array('id' => '1','name' => 'ENSAMBLAJE'),
		  	array('id' => '2','name' => 'LABORATORIO/CALIDAD'),
		  	array('id' => '3','name' => 'ALMACEN 1'),
            array('id' => '4','name' => 'ALMACEN 4'),
            array('id' => '5','name' => 'ALMACEN 6'),
            array('id' => '6','name' => 'GALVANIZADO'),
            array('id' => '7','name' => 'TALENTO HUMANO'),
            array('id' => '8','name' => 'MANTENIMIENTO'),
            array('id' => '9','name' => 'COMPRAS'),
            array('id' => '10','name' => 'LAMINACION'),
            array('id' => '11','name' => 'PRESIDENCIA'),
            array('id' => '12','name' => 'ADMINISTRACION'),
            array('id' => '13','name' => 'SEGURIDAD, SALUD LABORAL'),
            array('id' => '14','name' => 'VENTAS'),
            array('id' => '15','name' => 'PRODUCCION'),
            array('id' => '16','name' => 'SEGURIDAD FISICA'),
            array('id' => '17','name' => 'SISTEMAS'),
            array('id' => '18','name' => 'GERENCIA'),
            array('id' => '19','name' => 'TRASPORTE'),
            array('id' => '20','name' => 'SOLDADURA'),
            array('id' => '21','name' => 'PINTURA'),
            array('id' => '22','name' => 'TROQUELADO'),
            array('id' => '23','name' => 'ALMACEN Y DESPACHO'),
            array('id' => '24','name' => 'POLIETILENO'),
            array('id' => '25','name' => 'SERVICIOS'),
		);
        //insert manual a una base de datos con array
        \DB::table('departamentos')->insert($departamento);
    }
}