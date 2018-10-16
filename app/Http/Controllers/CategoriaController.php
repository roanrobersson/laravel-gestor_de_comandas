<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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
    $user_id = Auth::id();
    $categorias = Categoria::where('user_id', '=', $user_id)->get();

    return view( 'categoria_listar')->with(compact('categorias'));
  }

  public function criar()
  {
    return view('categoria_criar');
  }

  public function salvar(Request $request)
  {
    $user_id = Auth::id();
    $categoria = new Categoria;
    $categoria->nome = $request->nome;
    $categoria->user_id =  $user_id;
    $icone = $request->file('arquivo_icone')->store('categoria_icone');
    $categoria->icone = $icone;
    $categoria->save();

    return redirect()->route('categoria_listar')->with('alert', 'Categoria criada com sucesso!');
  }

  public function editar($id)
  {
    $user_id = Auth::id();
    $categoria = Categoria::where('id', '=', $id)->where('user_id', '=', $user_id)->first();

    return view('categoria_editar')->with(compact('categoria'));
  }

  public function atualizar(Request $request, $id)
  {
    $user_id = Auth::id();
    $categoria = Categoria::where('id', '=', $id)->where('user_id', '=', $user_id)->first();
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
    $user_id = Auth::id();
    $categoria = Categoria::where('id', '=', $id)->where('user_id', '=', $user_id)->first();
    Storage::delete($categoria->icone);
    $categoria->delete();

    return redirect()->route('categoria_listar')->with('alert', 'Categoria excluida com sucesso!');
  }

}
