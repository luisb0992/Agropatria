<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UbicacionExacta extends Model
{
    protected $table = 'ubicaciones_exactas';

    protected $fillable = [
    	'name','departamento_id'
    ];

    public function departamento(){
    	return $this->belongsTo('App\Departamento','departamento_id');
    }

    // busqueda de departamento
    public static function busqueda_dep($id){
    	return UbicacionExacta::where('departamento_id',$id)->get(['id','name']);
    }
}
