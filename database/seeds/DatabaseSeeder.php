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
        $this->call(DepartamentoTableSeeder::class);
        $this->call(StatusBienesTableSeeder::class);
        $this->call(PerfilTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CatTableSeeder::class);
        $this->call(SubCategoriasTableSeeder::class);
        $this->call(TipoSubcatTableSeeder::class);
    }
}
