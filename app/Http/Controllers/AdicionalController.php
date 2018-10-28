<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Categoria;
use App\Adicional;
use Illuminate\Database\QueryException;

class AdicionalController extends Controller
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
    $adicionais = Adicional::all()->sortBy("nome");
    $categorias = Categoria::all()->sortBy("nome");

    return view('adicional_listar')->with(compact('categorias'))->with(compact('adicionais'));
  }

  /**
  * criar
  */
  public function criar(Request $request)
  {

    $categorias = Categoria::all()->sortBy("nome");

    if(count($categorias) > 0){
      return view('adicional_criar')->with(compact('categorias'));
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
    $adicional = Adicional::where('nome' , $nome)->where('categoria_id', $categoria_id)->first();

    if( !isset($adicional) )
    {
      $valor = $request->valor;
      $valorFormatado = substr($valor, 3);
      $valorFormatado = str_replace(".", "", $valorFormatado);
      $valorFormatado = str_replace(",", ".", $valorFormatado);
      $adicional = new Adicional;
      $adicional->nome = $request->nome;
      $adicional->categoria_id = $request->categoria_id;
      $adicional->valor = $valorFormatado;
      $adicional->save();

      return redirect()->route('adicional_listar')->with('alert', 'Adicional criado com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }
    else
    {
      return redirect()->back()->with('alert', 'Já existe um adicional com esse nome!')
                                                  ->with('alertClass', 'alert-danger');
    }

  }

  /**
  * editar
  */
  public function editar($id)
  {
    $categorias = Categoria::all()->sortBy("nome");
    $adicional = Adicional::find($id);

    return view('adicional_editar')->with(compact('categorias'))->with(compact('adicional'));
  }

  /**
  * atualizar
  */
  public function atualizar(Request $request, $id)
  {
    $nome = $request->nome;
    $categoria_id = $request->categoria_id;
    $adicional = Adicional::where('nome', $nome)->where('categoria_id', $categoria_id)->first();

    if( !isset($adicional) )
    {
      $adicional = Adicional::find($id);
      $valor = $request->valor;
      $valorFormatado = substr($valor, 3);
      $valorFormatado = str_replace(".", "", $valorFormatado);
      $valorFormatado = str_replace(",", ".", $valorFormatado);
      $adicional->nome = $request->nome;
      $adicional->categoria_id = $request->categoria_id;
      $adicional->valor = $valorFormatado;
      $adicional->save();

      return redirect()->route('adicional_listar')->with('alert', 'Adicional editado com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }
    else
    {
      return redirect()->back()->with('alert', 'Já existe um adicional com esse nome!')
                                                  ->with('alertClass', 'alert-danger');
    }

  }

  /**
  * apagar
  */
  public function apagar($id)
  {
    $adicional = Adicional::find($id);
    $adicional->delete();

    return redirect()->route('adicional_listar')->with('alert', 'Adicional excluido com sucesso!')
                                               ->with('alertClass', 'alert-success');
  }

}
