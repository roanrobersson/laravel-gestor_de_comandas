<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';
    public $timestamps = false;

    public function usuarios()
    {
      return $this->hasMany('App\Grupo');
    }

}
