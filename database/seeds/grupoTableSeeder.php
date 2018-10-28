<?php

use Illuminate\Database\Seeder;

class grupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('grupo')->delete();

      DB::table('grupo')->insert([
        'id' => '1',
        'nome' => 'Administrador'
      ]);

      DB::table('grupo')->insert([
        'id' => '2',
        'nome' => 'Padrão'
      ]);
    }
}
