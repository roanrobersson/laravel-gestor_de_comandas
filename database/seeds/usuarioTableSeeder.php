<?php

use Illuminate\Database\Seeder;

class usuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('usuario')->delete();

      DB::table('usuario')->insert([
        'name' => 'Roan de Oliveira',
        'email' => 'roanrobersson@gmail.com',
        'password' => bcrypt('cavalote'),
        'grupo_id' => '1'
      ]);

      DB::table('usuario')->insert([
        'name' => 'Suelen Moreira',
        'email' => 'susuzinha@gmail.com',
        'password' => bcrypt('cavalote'),
        'grupo_id' => '2'
      ]);
    }
}
