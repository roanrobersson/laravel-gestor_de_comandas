<?php

use Illuminate\Database\Seeder;

class comandaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('comanda')->delete();

      DB::table('comanda')->insert([
        'id' => '1',
        'usuario_id' => '1',
        'nomeCliente' => 'Fernando de Oliveira',
      ]);

      DB::table('comanda')->insert([
        'id' => '2',
        'usuario_id' => '1',
        'nomeCliente' => 'Maicon Cazzonato',
      ]);

      DB::table('comanda')->insert([
        'id' => '3',
        'usuario_id' => '1',
        'nomeCliente' => 'Roberto de Souza',
      ]);

      DB::table('comanda')->insert([
        'id' => '4',
        'usuario_id' => '1',
        'nomeCliente' => 'Mariele Lebedieff',
      ]);

      DB::table('comanda')->insert([
        'id' => '5',
        'usuario_id' => '1',
        'nomeCliente' => 'Bruna Rigo',
      ]);

      DB::table('comanda')->insert([
        'id' => '6',
        'usuario_id' => '1',
        'nomeCliente' => 'Íria Tirapele',
      ]);

      DB::table('comanda')->insert([
        'id' => '7',
        'usuario_id' => '1',
        'nomeCliente' => 'Pedro Antônio Pegoraro',
      ]);

    }
}
