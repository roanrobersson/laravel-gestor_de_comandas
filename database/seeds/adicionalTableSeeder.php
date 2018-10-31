<?php

use Illuminate\Database\Seeder;

class adicionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('adicional')->delete();



      // Cachorro-quente
      DB::table('adicional')->insert([
        'nome' => 'Queijo mussarela',
        'categoria_Id' => '1',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Queijo cheddar',
        'categoria_Id' => '1',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Ovo frito',
        'categoria_Id' => '1',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Presunto',
        'categoria_Id' => '1',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Bacon',
        'categoria_Id' => '1',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Calabresa',
        'categoria_Id' => '1',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Catupiry',
        'categoria_Id' => '1',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Gorgonzola',
        'categoria_Id' => '1',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Barbecue',
        'categoria_Id' => '1',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Tomate',
        'categoria_Id' => '1',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Alface',
        'categoria_Id' => '1',
        'valor' => '0.50'
      ]);



      // Batata frita
      DB::table('adicional')->insert([
        'nome' => 'Queijo mussarela',
        'categoria_Id' => '2',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Queijo cheddar',
        'categoria_Id' => '2',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Bacon',
        'categoria_Id' => '2',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Calabresa',
        'categoria_Id' => '2',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Catupiry',
        'categoria_Id' => '2',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Gorgonzola',
        'categoria_Id' => '2',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Barbecue',
        'categoria_Id' => '2',
        'valor' => '0.50'
      ]);



      // Suco
      DB::table('adicional')->insert([
        'nome' => 'Limão',
        'categoria_Id' => '3',
        'valor' => '0.50'
      ]);



      // Sanduiche
      DB::table('adicional')->insert([
        'nome' => 'Queijo mussarela',
        'categoria_Id' => '4',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Queijo cheddar',
        'categoria_Id' => '4',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Ovo frito',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Presunto',
        'categoria_Id' => '4',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Bacon',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Calabresa',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Catupiry',
        'categoria_Id' => '4',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Gorgonzola',
        'categoria_Id' => '4',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Barbecue',
        'categoria_Id' => '4',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Tomate',
        'categoria_Id' => '4',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Alface',
        'categoria_Id' => '4',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Palmito',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Hamburguer',
        'categoria_Id' => '4',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Filé',
        'categoria_Id' => '4',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Champignon',
        'categoria_Id' => '4',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Coração de frango',
        'categoria_Id' => '4',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Frango',
        'categoria_Id' => '4',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Cebola',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Molho madeira',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Katchup',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Mostarda',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Maionese',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Batata palha',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Azeitona',
        'categoria_Id' => '4',
        'valor' => '1.00'
      ]);



      // Refrigerante
      DB::table('adicional')->insert([
        'nome' => 'Limão',
        'categoria_Id' => '5',
        'valor' => '0.50'
      ]);




      // X
      DB::table('adicional')->insert([
        'nome' => 'Queijo mussarela',
        'categoria_Id' => '6',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Queijo cheddar',
        'categoria_Id' => '6',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Ovo frito',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Presunto',
        'categoria_Id' => '6',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Bacon',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Calabresa',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Catupiry',
        'categoria_Id' => '6',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Gorgonzola',
        'categoria_Id' => '6',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Barbecue',
        'categoria_Id' => '6',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Tomate',
        'categoria_Id' => '6',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Alface',
        'categoria_Id' => '6',
        'valor' => '0.50'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Palmito',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Hamburguer',
        'categoria_Id' => '6',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Filé',
        'categoria_Id' => '6',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Champignon',
        'categoria_Id' => '6',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Coração de frango',
        'categoria_Id' => '6',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Frango',
        'categoria_Id' => '6',
        'valor' => '2.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Cebola',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Molho madeira',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Katchup',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Mostarda',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Maionese',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Batata palha',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);

      DB::table('adicional')->insert([
        'nome' => 'Azeitona',
        'categoria_Id' => '6',
        'valor' => '1.00'
      ]);





    }
}
