<?php

use Illuminate\Database\Seeder;

class SubCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_categoria = array(
                  array('id' => '1','codigo' => '14010-0000','categoria_id' => '1','descripcion' => 'Maquinarias y equipos de construcción y mantenimiento'),
                  array('id' => '2','codigo' => '14020-0000','categoria_id' => '1','descripcion' => 'Maquinarias y equipos para mantenimiento de automotores'),
                  array('id' => '3','codigo' => '14030-0000','categoria_id' => '1','descripcion' => 'Maquinarias y equipos agrícolas y pecuarios'),
                  array('id' => '4','codigo' => '14040-0000','categoria_id' => '1','descripcion' => 'Maquinarias y equipos de artes gráficas y reproducción'),
                  array('id' => '5','codigo' => '14050-0000','categoria_id' => '1','descripcion' => 'Maquinarias y equipos industriales y de taller'),
                  array('id' => '6','codigo' => '14060-0000','categoria_id' => '1','descripcion' => 'Maquinarias y equipos de energía'),
                  array('id' => '7','codigo' => '14070-0000','categoria_id' => '1','descripcion' => 'Maquinarias y equipos de riego y acueductos'),
                  array('id' => '8','codigo' => '14080-0000','categoria_id' => '1','descripcion' => 'Equipos de almacen'),
                  array('id' => '9','codigo' => '14990-0000','categoria_id' => '1','descripcion' => 'Otras maquinarias y demás equipos de construcción, campo, industria y taller'),
                  array('id' => '10','codigo' => '15010-0000','categoria_id' => '2','descripcion' => 'Vehículos automotores terrestres'),
                  array('id' => '11','codigo' => '15020-0000','categoria_id' => '2','descripcion' => 'Equipos ferroviarios y de cables aéreos'),
                  array('id' => '12','codigo' => '15030-0000','categoria_id' => '2','descripcion' => 'Equipos marítimos de transporte'),
                  array('id' => '13','codigo' => '15040-0000','categoria_id' => '2','descripcion' => 'Equipos aéreos de transporte'),
                  array('id' => '14','codigo' => '15050-0000','categoria_id' => '2','descripcion' => 'Vehículos de tracción no motorizados'),
                  array('id' => '15','codigo' => '15060-0000','categoria_id' => '2','descripcion' => 'Equipos auxiliares de transporte'),
                  array('id' => '16','codigo' => '15990-0000','categoria_id' => '2','descripcion' => 'Otros equipos de transporte, tracción y elevación'),
                  array('id' => '17','codigo' => '16010-0000','categoria_id' => '3','descripcion' => 'Equipos de telecomunicaciones'),
                  array('id' => '18','codigo' => '16020-0000','categoria_id' => '3','descripcion' => 'Equipos de señalamiento'),
                  array('id' => '19','codigo' => '16030-0000','categoria_id' => '3','descripcion' => 'Equipos de control de tráfico aéreo'),
                  array('id' => '20','codigo' => '16040-0000','categoria_id' => '3','descripcion' => 'Equipos de correo'),
                  array('id' => '21','codigo' => '16990-0000','categoria_id' => '3','descripcion' => 'Otros equipos de comunicaciones y de señalamiento'),
                  array('id' => '22','codigo' => '17010-0000','categoria_id' => '4','descripcion' => 'Equipos médicos - quirúrgicos, dentales y veterinarios'),
                  array('id' => '23','codigo' => '17990-0000','categoria_id' => '4','descripcion' => 'Otros Equipos médicos - quirúrgicos, dentales y veterinarios'),
                  array('id' => '24','codigo' => '18010-0000','categoria_id' => '5','descripcion' => 'Equipos científicos y de laboratorio'),
                  array('id' => '25','codigo' => '18020-0000','categoria_id' => '5','descripcion' => 'Equipos de enseñanza, deporte y recreación'),
                  array('id' => '26','codigo' => '18030-0000','categoria_id' => '5','descripcion' => 'Obras de arte'),
                  array('id' => '27','codigo' => '18040-0000','categoria_id' => '5','descripcion' => 'Libros y revistas'),
                  array('id' => '28','codigo' => '18050-0000','categoria_id' => '5','descripcion' => 'Equipos religiosos'),
                  array('id' => '29','codigo' => '18060-0000','categoria_id' => '5','descripcion' => 'Instrumentos musicales'),
                  array('id' => '30','codigo' => '18990-0000','categoria_id' => '5','descripcion' => 'Otros equipos científicos, religiosos, de enseñanza y recreación'),
                  array('id' => '31','codigo' => '19010-0000','categoria_id' => '6','descripcion' => 'Equipos y armamentos de defensa y seguridad pública'),
                  array('id' => '32','codigo' => '19990-0000','categoria_id' => '6','descripcion' => 'Otros equipos para la defensa y seguridad pública'),
                  array('id' => '33','codigo' => '20010-0000','categoria_id' => '7','descripcion' => 'Mobiliario y equipos de oficina'),
                  array('id' => '34','codigo' => '20020-0000','categoria_id' => '7','descripcion' => 'Equipos de procesamiento de datos'),
                  array('id' => '35','codigo' => '20090-0000','categoria_id' => '7','descripcion' => 'Mobiliario y equipos de alojamiento'),
                  array('id' => '36','codigo' => '20990-0000','categoria_id' => '7','descripcion' => 'Otras máquinas, muebles y demás equipos de oficina y de alojamiento'),
                  array('id' => '37','codigo' => '21010-0000','categoria_id' => '8','descripcion' => 'Semovientes'),
				);
        //insert manual a una base de datos con array
        \DB::table('sub_categorias')->insert($sub_categoria);
    }
}