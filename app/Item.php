<?php

namespace App;

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

}
