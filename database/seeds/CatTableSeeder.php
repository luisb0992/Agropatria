<?php

use Illuminate\Database\Seeder;

class CatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = array(
				  array('id' => '1','codigo' => '14000-0000','descripcion' =>'Maquinaria y demás equipos de construcción, campo, industria y taller'),
				  array('id' => '2','codigo' => '15000-0000','descripcion' =>'Equipos de transporte, tracción y elevación'),
				  array('id' => '3','codigo' => '16000-0000','descripcion' =>'Equipos de comunicaciones y de señalamiento'),
				  array('id' => '4','codigo' => '17000-0000','descripcion' =>'Equipos médicos - quirúrgicos, dentales y veterinarios'),
				  array('id' => '5','codigo' => '18000-0000','descripcion' =>'Equipos científicos, religiosos, de enseñanza y recreación'),
				  array('id' => '6','codigo' => '19000-0000','descripcion' =>'Equipos de defensa y seguridad del Estado'),
				  array('id' => '7','codigo' => '20000-0000','descripcion' =>'Máquinas, muebles y demás equipos de oficina y de alojamiento'),
				  array('id' => '8','codigo' => '21000-0000','descripcion' =>'Semovientes'),
				);
        //insert manual a una base de datos con array
        \DB::table('categorias')->insert($categorias);
    }
}
