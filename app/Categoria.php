<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   protected $table = 'categorias';

   protected $fillable = [
   	'codigo','descripcion'
   ];
   
   //----------------relaciones
   public function bienes(){
    	return $this->hasMany('App\Producto');
    }

    public function subCategorias(){
    	return $this->hasMany('App\SubCategoria');
    }

}
