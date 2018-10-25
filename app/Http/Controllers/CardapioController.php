<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use App\Categoria;
use Illuminate\Database\QueryException;

class CardapioController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
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
    $itens = Item::where('user_id', '=', $user_id)->get();
    $categorias = Categoria::where('user_id', '=', $user_id)->get();

    return view('cardapio_listar')->with(compact('itens'))->with(compact('categorias'));
  }

  /**
  * criar
  */
  public function criar(Request $request)
  {

    $user_id = Auth::id();
    $categorias = Categoria::where('user_id', '=', $user_id)->get();

    if(count($categorias) > 0){
      return view('cardapio_criar')->with(compact('categorias'));
    }else{
      return redirect()->back()->with('alert', 'Primeiro é necessário cadastrar uma categoria!')
                                   ->with('alertClass', 'alert-danger');
    }
  }

  /**
  * salvar
  */
  public function salvar(Request $request)
  {
    $nome = $request->nome;
    $item = Item::where('nome' , '=', $nome)->first();

    if( !isset($item) )
    {
      $user_id = Auth::id();
      $valor = $request->valor;
      $valorFormatado = substr($valor, 3);
      $valorFormatado = str_replace(".", "", $valorFormatado);
      $valorFormatado = str_replace(",", ".", $valorFormatado);
      $item = new Item;
      $item->nome = $request->nome;
      $item->user_id =  $user_id;
      $item->categoria_id = $request->categoria_id;
      $item->valor = $valorFormatado;
      $item->save();

      return redirect()->route('cardapio_listar')->with('alert', 'Item criado com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }
    else
    {
      return redirect()->back()->with('alert', 'Já existe um item com esse nome!')
                                                  ->with('alertClass', 'alert-danger');
    }

  }

  /**
  * editar
  */
  public function editar($id)
  {
    $user_id = Auth::id();
    $categorias = Categoria::where('user_id', '=', $user_id)->get();
    $item = Item::where('id', '=', $id)->where('user_id', '=', $user_id)->first();

    return view('cardapio_editar')->with(compact('categorias'))->with(compact('item'));
  }

  /**
  * atualizar
  */
  public function atualizar(Request $request, $id)
  {
    $nome = $request->nome;
    $item = Item::where('nome' , '=', $nome)->first();

    if( !isset($item) )
    {
      $user_id = Auth::id();
      $item = Item::where('id', '=', $id)->where('user_id', '=', $user_id)->first();
      $valor = $request->valor;
      $valorFormatado = substr($valor, 3);
      $valorFormatado = str_replace(".", "", $valorFormatado);
      $valorFormatado = str_replace(",", ".", $valorFormatado);
      $item->nome = $request->nome;
      $item->user_id =  $user_id;
      $item->categoria_id = $request->categoria_id;
      $item->valor = $valorFormatado;
      $item->save();

      return redirect()->route('cardapio_listar')->with('alert', 'Item editado com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }
    else
    {
      return redirect()->back()->with('alert', 'Já existe um item com esse nome!')
                                                  ->with('alertClass', 'alert-danger');
    }

  }

  /**
  * apagar
  */
  public function apagar($id)
  {
    $user_id = Auth::id();
    $item = Item::where('id', '=', $id)->where('user_id', '=', $user_id)->first();
    echo($item->id);
    $item->delete();

    return redirect()->route('cardapio_listar')->with('alert', 'Item excluido com sucesso!')
                                               ->with('alertClass', 'alert-success');
  }

}
