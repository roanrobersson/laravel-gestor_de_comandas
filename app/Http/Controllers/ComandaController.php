<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comanda;
use App\Adicional;
use App\Item;
use App\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

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
      $comandas = Comanda::where('usuario_id', Auth::user()->id)->where('paga', null)->get()->sortBy("nomeCliente");

      return view( 'comanda_listar')->with(compact('comandas'));
    }


    /**
    * ver
    */
    public function ver($id)
    {
      $comanda = Comanda::find($id);
      $categoria = Categoria::all();

      $valorTotalComanda = 0;

      foreach($comanda->itens as $ci){
        $valorTotalComanda += $ci->valorTotalComAdicionais($ci->pivot->id);
      }

      $valorTotalComandaFormatado = $valorTotalComanda;
      $valorTotalComandaFormatado = str_replace(".", ",", $valorTotalComandaFormatado);



      return view('comanda_ver')->with(compact('comanda'))->with(compact('categoria'))->with('valorTotalComandaFormatado', $valorTotalComandaFormatado);
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
      $comanda->paga = null;
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
      $ids = DB::table('comanda_item')->where('comanda_id', $id)->pluck('id');

      foreach ($ids as $i) {
        DB::table('adicional_comanda_item')->where('comanda_item_id', $i)->delete();
      }

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

      DB::table('adicional_comanda_item')->where('comanda_item_id', $pivotId)->delete();

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
    public function novoPedido(Request $request, $id)
    {
      $categoria_id = $request->categoria_id;
      $comanda = Comanda::find($id);
      $itens = Item::all()->where('categoria_id', $categoria_id);
      $adicional = Adicional::all()->where('categoria_id', $categoria_id);

      return view('comanda_novoPedido')->with(compact('comanda'))->with(compact('itens'))->with(compact('adicional'));
    }

    /**
    * salvarPedido
    */
    public function salvarPedido(Request $request, $id)
    {
      $quantidade = $request->quantidade;
      $item_id = $request->item_id;
      $adicional_id = $request->adicional_id;
      $observacao = $request->observacao;
      $comanda = Comanda::find($id);

      for ($i=0; $i < $quantidade ; $i++) {
        if($observacao == null){
          $comanda_item_id = DB::table('comanda_item')->insertGetId(
              ['comanda_id' => $id, 'item_id' => $item_id]
          );
        }else{
          $comanda_item_id = DB::table('comanda_item')->insertGetId(
              ['comanda_id' => $id, 'item_id' => $item_id, 'observacao' => $observacao]
          );
        }

        if($adicional_id <> 0) {
          DB::table('adicional_comanda_item')->insert(
              ['adicional_id' => $adicional_id, 'comanda_item_id' => $comanda_item_id]
          );
        }

      }

      return redirect()->route('comanda_ver', ['id' => $id])->with('alert', 'Comanda finalizada com sucesso!')
                                                  ->with('alertClass', 'alert-success');

    }


    /**
    * atualizarPagamento
    */
    public function atualizarPagamento(Request $request, $id)
    {
      $comanda = Comanda::find($id);

      $valorDesconto = $request->valorDesconto;
      $valorDescontoFormatado = substr($valorDesconto, 3);
      $valorDescontoFormatado = str_replace(".", "", $valorDescontoFormatado);
      $valorDescontoFormatado = str_replace(",", ".", $valorDescontoFormatado);

      if ($valorDescontoFormatado > 0.00) {
        $comanda->desconto = $valorDescontoFormatado;
      }

      $comanda->paga = true;
      $comanda->save();
      return redirect()->route('comanda_listar')->with('alert', 'Comanda finalizada com sucesso!')
                                                  ->with('alertClass', 'alert-success');
    }



}
