<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = ['id','name'];

    public function productoEstado(){
    	$this->hasMany('App\Producto');
    }

}
