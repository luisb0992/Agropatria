<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'sub_categorias';

    protected $fillable = [
    	'codigo','descripcion','categoria_id'
    ];

    public function categoria(){
        return $this->belongsTo('App\Categoria','categoria_id');
    }

    public function tiposSubcat(){
        return $this->hasMany('App\TipoSubcat');
    }

    //busqueda de subcategorias ajax
    public static function busquedaDeSubCategorias($id){
    	return SubCategoria::where('categoria_id',$id)->get(['id','descripcion']);
    }
}
