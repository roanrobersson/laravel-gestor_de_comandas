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
        'nome' => 'Cachorro-quente Tudo',
        'categoria_Id' => '1',
        'valor' => '15.00'
      ]);

      DB::table('item')->insert([
        'nome' => 'Cachorro-quente Calabresa',
        'categoria_Id' => '1',
        'valor' => '8.00'
      ]);

      DB::table('item')->insert([
        'nome' => 'Cachorro-quente Bacon',
        'categoria_Id' => '1',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Cachorro-quente Duplo',
        'categoria_Id' => '1',
        'valor' => '4.50'
      ]);

      DB::table('item')->insert([
        'nome' => 'Cachorro-quente Pizza',
        'categoria_Id' => '1',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Cachorro-quente Tradicional',
        'categoria_Id' => '1',
        'valor' => '3.50'
      ]);

      DB::table('item')->insert([
        'nome' => 'Cachorro-quente Frango',
        'categoria_Id' => '1',
        'valor' => '5.50'
      ]);



      // Batata frita
      DB::table('item')->insert([
        'nome' => 'Batata frita Rústica',
        'categoria_Id' => '2',
        'valor' => '8'
      ]);

      DB::table('item')->insert([
        'nome' => 'Batata frita Palito',
        'categoria_Id' => '2',
        'valor' => '10'
      ]);

      DB::table('item')->insert([
        'nome' => 'Batata frita Smile',
        'categoria_Id' => '2',
        'valor' => '11'
      ]);

      DB::table('item')->insert([
        'nome' => 'Batata frita Chips',
        'categoria_Id' => '2',
        'valor' => '15'
      ]);

      DB::table('item')->insert([
        'nome' => 'Torre de batata frita c/ cheddar e bacon',
        'categoria_Id' => '2',
        'valor' => '30'
      ]);

      DB::table('item')->insert([
        'nome' => 'Torre de batata frita 4 queijos',
        'categoria_Id' => '2',
        'valor' => '30'
      ]);



      // Suco
      DB::table('item')->insert([
        'nome' => 'Suco de Morango',
        'categoria_Id' => '3',
        'valor' => '3'
      ]);

      DB::table('item')->insert([
        'nome' => 'Suco de Laranja',
        'categoria_Id' => '3',
        'valor' => '2.50'
      ]);

      DB::table('item')->insert([
        'nome' => 'Suco de Limão',
        'categoria_Id' => '3',
        'valor' => '2.50'
      ]);

      DB::table('item')->insert([
        'nome' => 'Suco de Abacaxi',
        'categoria_Id' => '3',
        'valor' => '3'
      ]);



      // Sanduíche
      DB::table('item')->insert([
        'nome' => 'Sanduíche de Quatro queijos',
        'categoria_Id' => '4',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Calabresa',
        'categoria_Id' => '4',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Churrasco',
        'categoria_Id' => '4',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Presunto',
        'categoria_Id' => '4',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Bacon',
        'categoria_Id' => '4',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Atum',
        'categoria_Id' => '4',
        'valor' => '4'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Frango Pizzaiolo',
        'categoria_Id' => '4',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche Italiano',
        'categoria_Id' => '4',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Almôndegas',
        'categoria_Id' => '4',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Frango',
        'categoria_Id' => '4',
        'valor' => '4'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Carne e queijo',
        'categoria_Id' => '4',
        'valor' => '3'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Rosbife',
        'categoria_Id' => '4',
        'valor' => '8'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Frango defumado',
        'categoria_Id' => '4',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche Vegetariano',
        'categoria_Id' => '4',
        'valor' => '2.00'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Coração de frango',
        'categoria_Id' => '4',
        'valor' => '8'
      ]);

      DB::table('item')->insert([
        'nome' => 'Sanduíche de Peru',
        'categoria_Id' => '4',
        'valor' => '8'
      ]);




      // Refrigerante
      DB::table('item')->insert([
        'nome' => 'Refrigerante Cola lata',
        'categoria_Id' => '5',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Cola 2L',
        'categoria_Id' => '5',
        'valor' => '10'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Cola 1.5L',
        'categoria_Id' => '5',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Cola 600ml',
        'categoria_Id' => '5',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Limão lata',
        'categoria_Id' => '5',
        'valor' => '4'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Limão 2L',
        'categoria_Id' => '5',
        'valor' => '9'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Limão 1.5L',
        'categoria_Id' => '5',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Limão 600ml',
        'categoria_Id' => '5',
        'valor' => '5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Laranja lata',
        'categoria_Id' => '5',
        'valor' => '5.5'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Laranja 2L',
        'categoria_Id' => '5',
        'valor' => '10'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Laranja 1.5L',
        'categoria_Id' => '5',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Laranja 600ml',
        'categoria_Id' => '5',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Uva lata',
        'categoria_Id' => '5',
        'valor' => '3'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Uva 2L',
        'categoria_Id' => '5',
        'valor' => '8'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Uva 1.5L',
        'categoria_Id' => '5',
        'valor' => '6'
      ]);

      DB::table('item')->insert([
        'nome' => 'Refrigerante Uva 600ml',
        'categoria_Id' => '5',
        'valor' => '5'
      ]);


      // X
      DB::table('item')->insert([
        'nome' => 'X Vegetariano',
        'categoria_Id' => '6',
        'valor' => '10'
      ]);

      DB::table('item')->insert([
        'nome' => 'X Quatro queijos',
        'categoria_Id' => '6',
        'valor' => '12'
      ]);

      DB::table('item')->insert([
        'nome' => 'X Tudo',
        'categoria_Id' => '6',
        'valor' => '25'
      ]);

      DB::table('item')->insert([
        'nome' => 'X A moda da casa',
        'categoria_Id' => '6',
        'valor' => '19'
      ]);

      DB::table('item')->insert([
        'nome' => 'X Bacon',
        'categoria_Id' => '6',
        'valor' => '13'
      ]);

      DB::table('item')->insert([
        'nome' => 'X Calabresa',
        'categoria_Id' => '6',
        'valor' => '13'
      ]);

      DB::table('item')->insert([
        'nome' => 'X Filé',
        'categoria_Id' => '6',
        'valor' => '14'
      ]);

      DB::table('item')->insert([
        'nome' => 'X Frango',
        'categoria_Id' => '6',
        'valor' => '7'
      ]);

      DB::table('item')->insert([
        'nome' => 'X Palmito',
        'categoria_Id' => '6',
        'valor' => '5'
      ]);






    }
}
