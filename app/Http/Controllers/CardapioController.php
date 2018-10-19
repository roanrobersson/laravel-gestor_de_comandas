<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Categoria; //APAGAR ISSO

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
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user_id = Auth::id();
    $categorias = Categoria::where('user_id', '=', $user_id)->get();

    return view('cardapio_lista')->with(compact('categorias'));
  }

  public function criar()
  {
    return view('cardapio_criar');
  }

}
