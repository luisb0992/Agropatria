<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSubcat extends Model
{
    protected $table = "tipos_subcat";

    protected $fillable = [
    	'codigo','sub_categoria_id','descripcion'
    ];

    public function subCategoria(){
    	return $this->belongsTo('App\SubCategoria','sub_categoria_id');
    }

    public static function tipoSubCat($id){
    	return TipoSubcat::where('sub_categoria_id',$id)->get(['id','descripcion']);
    }
}
