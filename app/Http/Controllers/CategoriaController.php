<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $categorias = Categoria::all();
    return view( 'categoria_listar')->with(compact('categorias'));
  }

  public function criar()
  {
    //return redirect()->back()->with('alert', 'Impossível criar categoria');
    return view('categoria_criar');
  }

  public function salvar(Request $request)
  {
    $path = $request->file('arquivo_icone')->store('categoria_icone');
    return view('categoria_listar');
    //echo('<img src="storage/categoria_icone/cachorro-quente.png" />');
  }

  public function editar($id)
  {

  }

  public function atualizar($id)
  {
  }

  public function apagar($id)
  {
    echo('Apagando......');
  }

}
