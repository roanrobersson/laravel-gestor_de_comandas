<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class categoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categoria')->delete();

      DB::table('categoria')->insert([
        'id' => '1',
        'nome' => 'Cachorro-quente',
        'icone' => 'categoria_icone/cachorro-quente.png'
      ]);

      DB::table('categoria')->insert([
        'id' => '2',
        'nome' => 'Fritas',
        'icone' => 'categoria_icone/fritas.png'
      ]);

      DB::table('categoria')->insert([
        'id' => '3',
        'nome' => 'Suco',
        'icone' => 'categoria_icone/suco.png'
      ]);

      DB::table('categoria')->insert([
        'id' => '4',
        'nome' => 'Sanduiche',
        'icone' => 'categoria_icone/sanduiche.png'
      ]);

      DB::table('categoria')->insert([
        'id' => '5',
        'nome' => 'Refrigerante',
        'icone' => 'categoria_icone/refrigerante.png'
      ]);

      DB::table('categoria')->insert([
        'id' => '6',
        'nome' => 'X',
        'icone' => 'categoria_icone/x.png'
      ]);

      Storage::deleteDirectory('categoria_icone');
      Storage::copy('categoria_icone_default/cachorro-quente.png', 'categoria_icone/cachorro-quente.png');
      Storage::copy('categoria_icone_default/fritas.png', 'categoria_icone/fritas.png');
      Storage::copy('categoria_icone_default/suco.png', 'categoria_icone/suco.png');
      Storage::copy('categoria_icone_default/refrigerante.png', 'categoria_icone/refrigerante.png');
      Storage::copy('categoria_icone_default/sanduiche.png', 'categoria_icone/sanduiche.png');
      Storage::copy('categoria_icone_default/x.png', 'categoria_icone/x.png');
      Storage::makeDirectory('categoria_icone');
    }
}
