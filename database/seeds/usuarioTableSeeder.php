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
        'id' => '1',
        'name' => 'Roan de Oliveira',
        'email' => 'roanrobersson@gmail.com',
        'password' => bcrypt('cavalote'),
        'grupo_id' => '1'
      ]);

      DB::table('usuario')->insert([
        'id' => '2',
        'name' => 'Suelen Moreira',
        'email' => 'susuzinha@gmail.com',
        'password' => bcrypt('cavalote'),
        'grupo_id' => '2'
      ]);

      DB::table('usuario')->insert([
        'id' => '3',
        'name' => 'Marcos de Souza Júnior',
        'email' => 'marquinhos@gmail.com',
        'password' => bcrypt('cavalote'),
        'grupo_id' => '2'
      ]);

      DB::table('usuario')->insert([
        'id' => '4',
        'name' => 'Felipe André Cordeiro',
        'email' => 'felipinho@gmail.com',
        'password' => bcrypt('cavalote'),
        'grupo_id' => '2'
      ]);

      DB::table('usuario')->insert([
        'id' => '5',
        'name' => 'Pedro André Pereira',
        'email' => 'pedrinho@gmail.com',
        'password' => bcrypt('cavalote'),
        'grupo_id' => '2'
      ]);

    }
}
