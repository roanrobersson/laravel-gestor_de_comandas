<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table = 'item';
  public $timestamps = false;

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function Categoria()
  {
      return $this->belongsTo('App\Categoria');
  }
}
