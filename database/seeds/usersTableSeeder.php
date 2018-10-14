<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();

      DB::table('users')->insert([
        'name' => 'Roan de Oliveira',
        'email' => 'roanrobersson@gmail.com',
        'password' => bcrypt('cavalote'),
      ]);

      DB::table('users')->insert([
        'name' => 'Suelen Moreira',
        'email' => 'susuzinha@gmail.com',
        'password' => bcrypt('cavalote'),
      ]);
    }
}
