<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class adicional_comanda_itemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $quantidadeComanda_item = DB::table('comanda_item')->count();
      $quantidadeAdicional = DB::table('adicional')->count();
      DB::table('adicional_comanda_item')->delete();

      for ($i=1; $i <= $quantidadeComanda_item; $i++) {
        for ($j=0; $j < rand(0, 7); $j++) {
          DB::table('adicional_comanda_item')->insert([
            'adicional_id' => rand(1, $quantidadeAdicional),
            'comanda_item_id' => rand(1, $i)
          ]);
        }
      }

    }
}
