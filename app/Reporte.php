<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reporte extends Model
{
    protected $table = 'reportes';
    protected $fillable = ['producto_id','user_id'];
    
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

    //definiendo relaciones
    public function productos(){
        return $this->belongsTo('App\Producto','producto_id');
    }

    public function users(){
        return $this->belongsTo('App\Users','user_id');
    }

    //metodos de obtencion de los nombres
    public function nameUser(){
        return $this->users->name." ".$this->users->ape;
    }



}
