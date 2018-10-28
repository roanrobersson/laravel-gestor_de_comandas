<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    public function usuario()
    {
      return $this->belongsTo('App\User');
    }

    public function itens()
    {
      return $this->belongsToMany('App\Item');
    }
}
