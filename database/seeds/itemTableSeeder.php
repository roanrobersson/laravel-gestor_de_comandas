<?php

use Illuminate\Database\Seeder;

class itemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('item')->delete();

      // Cachorro-quente
      DB::table('item')->insert([
        'nome' => 'Tudo',
        'categoria_Id' => '1',
        'valor' => '15.00'
      ]);

      DB::table('item')->insert([
        'nome' => 'Calabresa',
        'categoria_Id' => '1',
        'valor' => '8.00'
      ]);

      DB::table('item')->insert([
        'nome' => 'Bacon',
        'categoria_Id' => '1',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Duplo',
        'categoria_Id' => '1',
        'valor' => '4.50'
      ]);

      DB::table('item')->insert([
        'nome' => 'Pizza',
        'categoria_Id' => '1',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => '4 Queijos',
        'categoria_Id' => '1',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Tradicional',
        'categoria_Id' => '1',
        'valor' => '3.50'
      ]);

      DB::table('item')->insert([
        'nome' => 'Frango',
        'categoria_Id' => '1',
        'valor' => '5.50'
      ]);



      // Batata frita
      DB::table('item')->insert([
        'nome' => 'Rústica',
        'categoria_Id' => '2',
        'valor' => '8'
      ]);

      DB::table('item')->insert([
        'nome' => 'Palito',
        'categoria_Id' => '2',
        'valor' => '10'
      ]);

      DB::table('item')->insert([
        'nome' => 'Smile',
        'categoria_Id' => '2',
        'valor' => '11'
      ]);

      DB::table('item')->insert([
        'nome' => 'Chips',
        'categoria_Id' => '2',
        'valor' => '15'
      ]);

      DB::table('item')->insert([
        'nome' => 'Torre c/ cheddar e bacon',
        'categoria_Id' => '2',
        'valor' => '30'
      ]);

      DB::table('item')->insert([
        'nome' => 'Torre 4 queijos',
        'categoria_Id' => '2',
        'valor' => '30'
      ]);



      // Suco
      DB::table('item')->insert([
        'nome' => 'Morango',
        'categoria_Id' => '3',
        'valor' => '3'
      ]);

      DB::table('item')->insert([
        'nome' => 'Laranja',
        'categoria_Id' => '3',
        'valor' => '2.50'
      ]);

      DB::table('item')->insert([
        'nome' => 'Limão',
        'categoria_Id' => '3',
        'valor' => '2.50'
      ]);

      DB::table('item')->insert([
        'nome' => 'Abacaxi',
        'categoria_Id' => '3',
        'valor' => '3'
      ]);



      // Sanduiche
      DB::table('item')->insert([
        'nome' => 'Quatro queijos',
        'categoria_Id' => '4',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Calabresa',
        'categoria_Id' => '4',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Churrasco',
        'categoria_Id' => '4',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Presunto',
        'categoria_Id' => '4',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Bacon',
        'categoria_Id' => '4',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Atum',
        'categoria_Id' => '4',
        'valor' => '4'
      ]);

      DB::table('item')->insert([
        'nome' => 'Frango Pizzaiolo',
        'categoria_Id' => '4',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Italiano',
        'categoria_Id' => '4',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Almôndegas',
        'categoria_Id' => '4',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Frango',
        'categoria_Id' => '4',
        'valor' => '4'
      ]);

      DB::table('item')->insert([
        'nome' => 'Carne e queijo',
        'categoria_Id' => '4',
        'valor' => '3'
      ]);

      DB::table('item')->insert([
        'nome' => 'Rosbife',
        'categoria_Id' => '4',
        'valor' => '8'
      ]);

      DB::table('item')->insert([
        'nome' => 'Frango defumado',
        'categoria_Id' => '4',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Vegetariano',
        'categoria_Id' => '4',
        'valor' => '2.00'
      ]);

      DB::table('item')->insert([
        'nome' => 'Coração de frango',
        'categoria_Id' => '4',
        'valor' => '8'
      ]);

      DB::table('item')->insert([
        'nome' => 'Peru',
        'categoria_Id' => '4',
        'valor' => '8'
      ]);




      // Refrigerante
      DB::table('item')->insert([
        'nome' => 'Cola lata',
        'categoria_Id' => '5',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Cola 2L',
        'categoria_Id' => '5',
        'valor' => '10'
      ]);

      DB::table('item')->insert([
        'nome' => 'Cola 1.5L',
        'categoria_Id' => '5',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Cola 600ml',
        'categoria_Id' => '5',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Limão lata',
        'categoria_Id' => '5',
        'valor' => '4'
      ]);

      DB::table('item')->insert([
        'nome' => 'Limão 2L',
        'categoria_Id' => '5',
        'valor' => '9'
      ]);

      DB::table('item')->insert([
        'nome' => 'Limão 1.5L',
        'categoria_Id' => '5',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Limão 600ml',
        'categoria_Id' => '5',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Laranja lata',
        'categoria_Id' => '5',
        'valor' => '5.5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Laranja 2L',
        'categoria_Id' => '5',
        'valor' => '10'
      ]);

      DB::table('item')->insert([
        'nome' => 'Laranja 1.5L',
        'categoria_Id' => '5',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Laranja 600ml',
        'categoria_Id' => '5',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Uva lata',
        'categoria_Id' => '5',
        'valor' => '3'
      ]);

      DB::table('item')->insert([
        'nome' => 'Uva 2L',
        'categoria_Id' => '5',
        'valor' => '8'
      ]);

      DB::table('item')->insert([
        'nome' => 'Uva 1.5L',
        'categoria_Id' => '5',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Uva 600ml',
        'categoria_Id' => '5',
        'valor' => '5'
      ]);


      // X
      DB::table('item')->insert([
        'nome' => 'Vegetariano',
        'categoria_Id' => '6',
        'valor' => '10'
      ]);

      DB::table('item')->insert([
        'nome' => 'Quatro queijos',
        'categoria_Id' => '6',
        'valor' => '12'
      ]);

      DB::table('item')->insert([
        'nome' => 'Tudo',
        'categoria_Id' => '6',
        'valor' => '25'
      ]);

      DB::table('item')->insert([
        'nome' => 'A moda da casa',
        'categoria_Id' => '6',
        'valor' => '19'
      ]);

      DB::table('item')->insert([
        'nome' => 'Bacon',
        'categoria_Id' => '6',
        'valor' => '13'
      ]);

      DB::table('item')->insert([
        'nome' => 'Calabresa',
        'categoria_Id' => '6',
        'valor' => '13'
      ]);

      DB::table('item')->insert([
        'nome' => 'Filé',
        'categoria_Id' => '6',
        'valor' => '14'
      ]);

      DB::table('item')->insert([
        'nome' => 'Frango',
        'categoria_Id' => '6',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Palmito',
        'categoria_Id' => '6',
        'valor' => '5'
      ]);






    }
}
