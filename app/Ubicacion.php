<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
	protected $table = 'ubicaciones';
    protected $fillable = ['name'];

    public function productoUbicacion(){
    	$this->hasMany('App\Producto');
    }
}
