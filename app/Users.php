<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'cedula','name','ape','perfil_id','email', 'direccion','fechanac','password','status',
    ];

    public function perfil(){
        return $this->belongsTo('App\Perfil');
    }

    //-------------nombre del perfil
    public function namePerfil(){
        return $this->perfil->name;
    }

    //funcion para calcular la edad dependiendo de la fecha del usuario
    // gracias a la propiedad carbon incluida en laravel
    public function getAgeAttribute(){
        return \Carbon\Carbon::parse($this->fechanac)->age;
    }

    public function scopeType($query, $type){

        $tipos = config('select.perfil_id');

        if ($type != "" && isset($tipos[$type])) {
            $query->where('perfil_id', $type);
        }
    }

    public function scopeStatus($query, $type){

        $status = config('select.status');

        if ($type != "" && isset($status[$type])) {
            $query->where('status', $type);
        }
    }
//----------- recuperar y descencriptar password
    public function scopePassword($query, $type){

        $password = config('password');

        if ($type != "" && isset($password[$type])) {
            $query->where('password', $type);
        }
    }

    //conversion de fecha
    public function formatofecha(){
        $fecha = $this->fechanac;
        $conversionfecha = date('d-m-Y',strtotime(str_replace('/', '-', $fecha)));

        return $conversionfecha;
    }

    //conversion del formato de creacion y actualizacion del registro
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

    //------------ nombre del status
    public function nameStatus(){
        $status = $this->status;
        if ($status == 1) {
            $status = "ACTIVO";
        }else{
            $status = "INACTIVO";
        }

     return $status;   
    }
}
