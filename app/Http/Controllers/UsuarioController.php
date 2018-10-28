<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Grupo;
use Illuminate\Database\QueryException;

use App\Categoria; ///apagar issooooooooooooooooooooooooo

class UsuarioController extends Controller
{
  /**
  * index
  */
  public function index()
  {
    $categorias = Categoria::all()->sortBy("nome");

    return view( 'categoria_listar')->with(compact('categorias'));
  }

  /**
  * criar
  */
  public function criar()
  {
    return view('categoria_criar');
  }

  /**
  * Salvar
  */
  public function salvar(Request $request)
  {
    $nome = $request->nome;
    $categoria = Categoria::where('nome', $nome)->first();

    if( !isset($categoria) )
    {
      $categoria = new Categoria;
      $categoria->nome = $request->nome;
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
    $categoria = Categoria::find($id);

    return view('categoria_editar')->with(compact('categoria'));
  }

  /**
  * atualizar
  */
  public function atualizar(Request $request, $id)
  {
    $nome = $request->nome;
    $categoria = Categoria::where('nome', $nome)->first();

    if( !isset($categoria) )
    {
      $categoria = Categoria::find($id);
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
    $categoria = Categoria::find($id);
    $categoriaItens = count($categoria->itens);
    $categoriaAdicionais = count($categoria->adicionais);

    if( ($categoriaItens == 0) AND ($categoriaAdicionais == 0) ) {
      Storage::delete($categoria->icone);
      $categoria->delete();
      return redirect()->route('categoria_listar')->with('alert', 'Categoria excluida com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }
    else
    {
      return redirect()->route('categoria_listar')->with('alert', 'Essa categoria não pode ser excluída pois está relacionada a itens do cardápio e/ou adicionais!')
                                                  ->with('alertClass', 'alert-danger');
    }

  }
}
