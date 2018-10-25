<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
  * index
  */
  public function index()
  {
    $user_id = Auth::id();
    $categorias = Categoria::where('user_id', '=', $user_id)->get();

    return view( 'categoria_listar')->with(compact('categorias'));
  }

  /**
  * criar
  */
  public function criar()
  {
    return view('categoria_criar');
  }

  public function salvar(Request $request)
  {
    $nome = $request->nome;
    $categoria = Categoria::where('nome' , '=', $nome)->first();

    if( !isset($categoria) )
    {
      $user_id = Auth::id();
      $categoria = new Categoria;
      $categoria->nome = $request->nome;
      $categoria->user_id =  $user_id;
      $icone = $request->file('arquivo_icone')->store('categoria_icone');
      $categoria->icone = $icone;
      $categoria->save();
      return redirect()->route('categoria_listar')->with('alert', 'Categoria criada com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }
    else
    {
      return redirect()->back()->with('alert', 'Já existe uma categoria com esse nome!')
                                                  ->with('alertClass', 'alert-danger');
    }

  }

  /**
  * editar
  */
  public function editar($id)
  {
    $user_id = Auth::id();
    $categoria = Categoria::where('id', '=', $id)->where('user_id', '=', $user_id)->first();

    return view('categoria_editar')->with(compact('categoria'));
  }

  /**
  * atualizar
  */
  public function atualizar(Request $request, $id)
  {
    $nome = $request->nome;
    $categoria = Categoria::where('nome' , '=', $nome)->first();

    if( !isset($categoria) )
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
      return redirect()->route('categoria_listar')->with('alert', 'Categoria editada com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }
    else
    {
      return redirect()->back()->with('alert', 'Já existe uma categoria com esse nome!')
                                                ->with('alertClass', 'alert-danger');
    }

  }

  /**
  * apagar
  */
  public function apagar($id)
  {
    $user_id = Auth::id();
    $categoria = Categoria::where('id', '=', $id)->where('user_id', '=', $user_id)->first();

    if(count($categoria->itens) == 0) {
      Storage::delete($categoria->icone);
      $categoria->delete();
      return redirect()->route('categoria_listar')->with('alert', 'Categoria excluida com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }
    else
    {
      return redirect()->route('categoria_listar')->with('alert', 'Essa categoria não pode ser excluída pois está relacionada a itens do cardápio!')
                                                  ->with('alertClass', 'alert-danger');
    }

  }

}
