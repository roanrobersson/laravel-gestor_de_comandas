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

  public function salvar()
  {
  }

  public function editar()
  {
  }

  public function atualizar()
  {
  }

  public function apagar()
  {
  }

}
