<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material = array(
        			array('id' => '1','name' => 'SIN MATERIAL'),
				  	array('id' => '2','name' => 'PLASTICO'),
				  	array('id' => '3','name' => 'METAL'),
				  	array('id' => '4','name' => 'HIERRO'),
				  	array('id' => '5','name' => 'ALUMINIO'),
				  	array('id' => '6','name' => 'GOMA'),
				  	array('id' => '7','name' => 'FORMICA'),
				  	array('id' => '8','name' => 'TELA'),
				  	array('id' => '9','name' => 'VIDRIO'),
				  	array('id' => '10','name' => 'CUERO'),
				  	array('id' => '11','name' => 'SEMI-CUERO'),
				  	array('id' => '12','name' => 'MADERA'),
				  	array('id' => '13','name' => 'ACERO'),
				  	array('id' => '14','name' => 'FIBRA'),
				  	array('id' => '15','name' => 'LATON'),
				  	array('id' => '16','name' => 'CERAMICA'),
				  	// array('id' => '17','name' => 'PLASTICO-METAL'),
				  	// array('id' => '18','name' => 'PLASTICO-HIERRO'),
				  	// array('id' => '19','name' => 'PLASTICO-ALUMIIO'),
				  	// array('id' => '20','name' => 'PLASTICO-FORMICA'),
				  	// array('id' => '21','name' => 'PLASTICO-TELA'),
				  	// array('id' => '22','name' => 'PLASTICO-VIDRIO'),
				  	// array('id' => '23','name' => 'PLASTICO-CUERO'),
				  	// array('id' => '24','name' => 'PLASTICO-SEMICUERO'),
				  	// array('id' => '25','name' => 'PLASTICO-MADERA'),
				  	// array('id' => '26','name' => 'PLASTICO-ACERO'),
				  	// array('id' => '27','name' => 'PLASTICO-FIBRA'),
				  	// array('id' => '28','name' => 'PLASTICO-LATON'),
				  	// array('id' => '29','name' => 'PLASTICO-CERAMICA'),
		);
        //insert manual a una base de datos con array
        \DB::table('materiales')->insert($material);
    }
}
