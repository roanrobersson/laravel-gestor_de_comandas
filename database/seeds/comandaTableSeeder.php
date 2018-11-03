<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class comandaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      DB::table('comanda')->delete();

      for ($i=1; $i <= 5; $i++) {
        for ($j=1; $j < rand(10, 35); $j++) {
          DB::table('comanda')->insert([
            'usuario_id' => $i,
            'nomeCliente' => $faker->name,
          ]);
        }
      }

      DB::table('comanda')->insert([
        'usuario_id' => '1',
        'nomeCliente' => 'Roan Robersson de Oliveira',
      ]);

    }
}
