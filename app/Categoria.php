<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    public $timestamps = false;

    public function itens()
    {
        return $this->hasMany('App\Item');
    }

    public function adicionais()
    {
        return $this->hasMany('App\Adicional');
    }


}
