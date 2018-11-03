<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comanda;
use Illuminate\Database\QueryException;

class ComandaController extends Controller
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
      $comandas = Comanda::where('usuario_id', Auth::user()->id)->get()->sortBy("nomeCliente");

      return view( 'comanda_listar')->with(compact('comandas'));
    }


    /**
    * ver
    */
    public function ver($id)
    {
      $comanda = Comanda::find($id);

      return view('comanda_ver')->with(compact('comanda'));
    }


    /**
    * criar
    */
    public function criar()
    {
      return view('comanda_criar');
    }

    /**
    * Salvar
    */
    public function salvar(Request $request)
    {
      $comanda = new Comanda;
      $comanda->nomeCliente = $request->nomeCliente;
      $comanda->usuario_id = Auth::user()->id;
      $comanda->paga = false;
      $comanda->save();
      return redirect()->route('comanda_listar')->with('alert', 'Comanda criada com sucesso!')
                                                ->with('alertClass', 'alert-success');
    }

    /**
    * editar
    */
    public function editar($id)
    {
      $comanda = Comanda::find($id);
      return view('comanda_editar')->with(compact('comanda'));
    }

    /**
    * atualizar
    */
    public function atualizar(Request $request, $id)
    {
      $comanda = Comanda::find($id);
      $comanda->nomeCliente = $request->nomeCliente;
      $comanda->save();
      return redirect()->route('comanda_listar')->with('alert', 'Comanda editada com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }

    /**
    * apagar
    */
    public function apagar($id)
    {
      $comanda = Comanda::find($id);
      $comanda->itens()->detach();
      $comanda->delete();
      return redirect()->route('comanda_listar')->with('alert', 'Comanda excluída com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }

    /**
    * apagarItem
    */
    public function apagarItem($id, $pivotId)
    {
      $comanda = Comanda::find($id);
      $comanda->itens()->wherePivot('id', $pivotId)->detach();

      return redirect()->back()->with('alert', 'Item excluído com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }

    /**
    * pagar
    */
    public function pagar($id)
    {
      $comanda = Comanda::find($id);
      
      return view('comanda_pagar')->with(compact('comanda'));
    }

    /**
    * novoPedido
    */
    public function novoPedido()
    {

    }

    /**
    * salvarPedido
    */
    public function salvarPedido()
    {

    }


}
