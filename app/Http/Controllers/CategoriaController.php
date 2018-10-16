<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
    $categorias = null;
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
    $categoria = new Categoria;
    $categoria->nome = $request->nome;
    $categoria->user_id = \Auth::user()->id;
    $icone = $request->file('arquivo_icone')->store('categoria_icone');
    $categoria->icone = $icone;
    $categoria->save();

    return redirect()->route('categoria_listar')->with('alert', 'Categoria criada com sucesso!');
    //echo('<img src="storage/categoria_icone/cachorro-quente.png" />');
  }

  public function editar($id)
  {
    $categoria = Categoria::find($id);

    return view('categoria_editar')->with(compact('categoria'));
  }

  public function atualizar(Request $request, $id)
  {
    $categoria = Categoria::find($id);
    $categoria->nome = $request->nome;

    //Se enviou um novo ícone substitúi o antigo, se não, mantêm o antigo
    if ($request->hasFile('arquivo_icone')){
      $icone = $request->file('arquivo_icone')->store('categoria_icone');
      $categoria->icone = $icone;
    }

    $categoria->save();

    return redirect()->route('categoria_listar')->with('alert', 'Categoria editada com sucesso!');
  }

  public function apagar($id)
  {
    $categoria = Categoria::find($id);
    Storage::delete($categoria->icone);
    $categoria->delete();

    return redirect()->route('categoria_listar')->with('alert', 'Categoria excluida com sucesso!');
  }

}
