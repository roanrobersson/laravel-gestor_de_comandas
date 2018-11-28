<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use App\Categoria;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

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
    $itens = Item::all()->sortBy("nome");
    $categorias = Categoria::all()->sortBy("nome");

    return view('cardapio_listar')->with(compact('itens'))->with(compact('categorias'));
  }

  /**
  * criar
  */
  public function criar(Request $request)
  {

    $categorias = Categoria::all()->sortBy("nome");

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
    $categoria_id = $request->categoria_id;
    $item = Item::where('nome' , $nome)->where('categoria_id', $categoria_id)->first();

    if( !isset($item) )
    {
      $valor = $request->valor;
      $valorFormatado = substr($valor, 3);
      $valorFormatado = str_replace(".", "", $valorFormatado);
      $valorFormatado = str_replace(",", ".", $valorFormatado);
      $item = new Item;
      $item->nome = $request->nome;
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
    $categorias = Categoria::all()->sortBy("nome");
    $item = Item::find($id);

    return view('cardapio_editar')->with(compact('categorias'))->with(compact('item'));
  }

  /**
  * atualizar
  */
  public function atualizar(Request $request, $id)
  {
    $nome = $request->nome;
    $categoria_id = $request->categoria_id;
    $item = Item::where('nome', $nome)->where('categoria_id', $categoria_id)->where('id', '<>', $id)->first();

    if( !isset($item) )
    {
      $item = Item::find($id);
      $valor = $request->valor;
      $valorFormatado = substr($valor, 3);
      $valorFormatado = str_replace(".", "", $valorFormatado);
      $valorFormatado = str_replace(",", ".", $valorFormatado);
      $item->nome = $request->nome;
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
    $item = Item::find($id);

    $temp = DB::table('comanda_item')->where('item_id', $id)->get();
    $c = count($temp);

    if ($c == 0) {
      $item->delete();
      return redirect()->route('cardapio_listar')->with('alert', 'Item excluido com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }
    else
    {
      return redirect()->route('cardapio_listar')->with('alert', 'Esse adicional não pode ser excluída pois está relacionada a itens do cardápio e/ou adicionais!')
                                                  ->with('alertClass', 'alert-danger');
    }

  }

}
