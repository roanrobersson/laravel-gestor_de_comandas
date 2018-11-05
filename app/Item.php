<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    public $timestamps = false;

    public function categoria()
    {
      return $this->belongsTo('App\Categoria');
    }

    public function comandas()
    {
      return $this->belongsToMany('App\Comanda');
    }

    public function valorTotalComAdicionais($comanda_item_id)
    {
      $somaValorAdicionais = DB::table('adicional')
                  ->rightjoin('adicional_comanda_item', 'adicional.id', '=', 'adicional_comanda_item.adicional_id')
                  ->where('comanda_item_id', $comanda_item_id)
                  ->get()
                  ->sum('valor');

      $valorItem = $this->valor;

        return $somaValorAdicionais + $valorItem;
    }

}
