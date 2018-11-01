<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
          grupoTableSeeder::class,
          usuarioTableSeeder::class,
          categoriaTableSeeder::class,
          adicionalTableSeeder::class,
          itemTableSeeder::class,
          comandaTableSeeder::class,
          //Se estiver dando erro ao rodar o db:seed, use o comando "composer dump-autoload"
      ]);
    }
}
