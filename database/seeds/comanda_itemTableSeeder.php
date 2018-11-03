<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class comanda_itemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $quantidadeComandas = DB::table('comanda')->count();
      DB::table('comanda_item')->delete();

      for ($i=1; $i <= $quantidadeComandas; $i++) {
        for ($j=0; $j < rand(10, 20); $j++) {
          DB::table('comanda_item')->insert([
            'comanda_id' => $i,
            'item_id' => rand(1, 58),
            'observacao' => $faker->realText(rand(10,50))
          ]);
        }
      }

    }
}
