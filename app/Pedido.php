<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = ['descripcion','user_id','ubicacion_id','status'];

    //----- definiendo relaciones
    public function ubicaciones(){
    	return $this->belongsTo('App\Ubicacion','ubicacion_id');
    }

    //------- nombre de las ubicaciones
    public function nameUbicacion(){
    	return $this->ubicaciones->name;
    }

    //--------- FORMATO PARA FECHA
    public function forCreated(){
        $created = $this->created_at;
        $newcreated = date('d-m-Y',strtotime(str_replace('/', '-', $created)));
        return $newcreated;
    }

}
