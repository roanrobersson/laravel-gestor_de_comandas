<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
  protected $table = 'adicional';
  public $timestamps = false;

  public function categoria()
  {
      return $this->belongsTo('App\Categoria');
  }
}
