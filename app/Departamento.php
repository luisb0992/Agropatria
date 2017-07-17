<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
	protected $table = 'departamentos';
    protected $fillable = ['name'];

    //--------- definiendo relaciones
    public function bienes(){
    	return $this->hasMany('App\Producto');
    }
    public function ubicacionesExactas(){
    	return $this->hasMany('App\UbicacionExacta');
    }

    public function countUbicaciones($id){
    	return UbicacionExacta::where('departamento_id',$id)->count();
    }
}
