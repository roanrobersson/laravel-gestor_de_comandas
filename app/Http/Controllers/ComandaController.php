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
      $comandas = Comanda::all()->sortBy("nomeCliente");

      return view( 'comanda_listar')->with(compact('comandas'));
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
      $comanda->nomeCliente = $request->nome;
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
      $nome = $request->nome;
      $comanda = Comanda::where('nome', $nome)->first();

      if( !isset($comanda) )
      {
        $comanda = Comanda::find($id);
        $comanda->nome = $request->nome;

        //Se enviou um novo ícone substitúi o antigo, se não, mantêm o antigo
        if ($request->hasFile('arquivo_icone')){
          $icone = $request->file('arquivo_icone')->store('comanda_icone');
          $comanda->icone = $icone;
        }

        $comanda->save();
        return redirect()->route('comanda_listar')->with('alert', 'Comanda editada com sucesso!')
                                                    ->with('alertClass', 'alert-success');
      }
      else
      {
        return redirect()->back()->with('alert', 'Já existe uma comanda com esse nome!')
                                                  ->with('alertClass', 'alert-danger');
      }

    }

    /**
    * apagar
    */
    public function apagar($id)
    {
      $comanda = Comanda::find($id);
      $comandaItens = count($comanda->itens);
      $comandaAdicionais = count($comanda->adicionais);

      if( ($comandaItens == 0) AND ($comandaAdicionais == 0) ) {
        Storage::delete($comanda->icone);
        $comanda->delete();
        return redirect()->route('comanda_listar')->with('alert', 'Comanda excluida com sucesso!')
                                                    ->with('alertClass', 'alert-success');
      }
      else
      {
        return redirect()->route('comanda_listar')->with('alert', 'Essa comanda não pode ser excluída pois está relacionada a itens do cardápio e/ou adicionais!')
                                                    ->with('alertClass', 'alert-danger');
      }

    }
}
