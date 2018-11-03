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
      return $this->belongsToMany('App\Item')->withPivot('id');
    }
}
