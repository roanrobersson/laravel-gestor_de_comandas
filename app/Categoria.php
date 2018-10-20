<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function itens()
    {
        return $this->hasMany('App\Item');
    }

}
