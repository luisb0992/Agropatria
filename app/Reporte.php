<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reporte extends Model
{
    protected $table = 'reportes';
    protected $fillable = ['producto_id','user_id'];
S
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
