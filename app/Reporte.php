<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reporte extends Model
{
    protected $table = 'reportes';
    protected $fillable = ['producto_id','user_id'];


    //relacion con productos
    public function productos(){
    	return $this->belongsTo('App\Producto','producto_id');
    }

    //relacion con usuarios
    public function users(){
    	return $this->belongsTo('App\Users','user_id');
    }

    //devulve los nombres de productos
    public function nameProducto(){
      return $this->productos->descripcion;
   }

   //devulve los nombres de los usuarios
    public function nameUser(){
      return $this->users->name;
   }

   // conversion del formato de creacion y actualizacion del registro
    public function formatocreated(){
        $created = $this->created_at;
        $newcreated = date('d-m-Y',strtotime(str_replace('/', '-', $created)));
        return $newcreated;
    }

    public function formatoupdated(){
        $updated = $this->updated_at;
        $newupdated = date('d-m-Y',strtotime(str_replace('/', '-', $updated)));
        return $newupdated;
    }
  // fin de la conversion 


}
