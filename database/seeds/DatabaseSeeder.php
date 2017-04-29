<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstadoTableSeeder::class);
        $this->call(PerfilTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(TipoTableSeeder::class);
        $this->call(UbicacionTableSeeder::class);
    }
}
