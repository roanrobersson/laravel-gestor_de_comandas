<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    protected $table = 'comanda';
    public $timestamps = false;

    public function usuario()
    {
      return $this->belongsTo('App\User');
    }

    public function itens()
    {
      return $this->belongsToMany('App\Item')->withPivot('id', 'observacao');
    }

    public function valorTotalItensMaisAdicionais($comanda_id)
    {
      $somaValorAdicionais = DB::table('comanda')
                  ->rightjoin('adicional_comanda_item', 'adicional.id', '=', 'adicional_comanda_item.adicional_id')
                  ->where('comanda_item_id', $comanda_item_id)
                  ->get()
                  ->sum('valor');
                  EU TAVA ARRUMANDO ISSO AQUI
      $valorItem = $this->valor;

        return $somaValorAdicionais + $valorItem;
    }

}
