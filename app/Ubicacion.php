<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
	protected $table = 'ubicaciones';
    protected $fillable = ['name'];

    //--------- definiendo relaciones
    public function productoUbicacion(){
    	$this->hasMany('App\Producto');
    }

    public function pedido(){
    	$this->hasMany('App\Pedido');
    }
}
