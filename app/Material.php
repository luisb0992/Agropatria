<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiales';

    public function productoTipo(){
    	$this->hasMany('App\Producto');
    }
}
