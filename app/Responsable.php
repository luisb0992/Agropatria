<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsables';

    protected $fillable = [
    	'name','ape','cedula','bienes_id'
    ];

    //------------------ relaciones
    
    public function bienes(){
    	return $this->belongsTo('App\Producto','bienes_id');
    }
}
