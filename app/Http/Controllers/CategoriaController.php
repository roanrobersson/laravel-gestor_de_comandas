<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
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
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('categoria_listar');
  }

  public function criar()
  {
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
  }

}
