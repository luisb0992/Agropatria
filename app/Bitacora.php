<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';

    protected $fillable = [
    	'user_id','registro_id','tabla','accion'
    ];

    //registro para user_id
    public static function userAuth(){
    	if (\Auth::check()) {
    		return \Auth::user()->id;
    	}else{
    		return 999;
    	}
    }

    public function users(){
    	return $this->belongsTo('App\User','user_id');
    }

    //nombre completo del usuario
    public function username(){
    	return $this->users->name.' '.$this->users->ape;
    }

     // conversion del formato de creacion y actualizacion del registro
    public function forcreated(){
        $created = $this->created_at;
        $newcreated = date('d-m-Y',strtotime(str_replace('/', '-', $created)));
        return $newcreated;
    }

    public function forUpdated(){
        $updated = $this->updated_at;
        $newupdated = date('d-m-Y',strtotime(str_replace('/', '-', $updated)));
        return $newupdated;
    }
    // fin de la conversion

    // accion referenciada
    public function accion(){
    	$accion = $this->accion;
    	if ($accion == '1') {
    		$accion = "CREACION";
    	}else{
    		$accion = "EDICION";
    	}
    	return $accion;
    }

    //datos de los registros
    public function data(){
        $id = $this->registro_id;
        $tabla = $this->tabla;
        $datos = '';

        if ($tabla == 'departamento') {
             $datos = Departamento::where('id','=',$id)->get();
         }elseif ($tabla == 'ubicacion_exacta') {
             $datos = UbicacionExacta::where('id','=',$id)->get();
         }elseif ($tabla == 'categoria') {
             $datos = Categoria::where('id','=',$id)->get();
         }elseif($tabla == 'sub_categoria') {
             $datos = SubCategoria::where('id','=',$id)->get();
         }elseif ($tabla == 'tipo_sub_categoria') {
             $datos = TipoSubcat::where('id','=',$id)->get();
         }elseif ($tabla == 'bienes') {
             $datos = Producto::where('id','=',$id)->get();
         }elseif ($tabla == 'users') {
             $datos = Users::where('id','=',$id)->get();
         }

         return $datos;
    }

    //------------------ metodos contadores ----------------//
    //bitacora de hoy
    public static function today(){
        $date = date('d');
        return Bitacora::whereDay('created_at', $date)->count();
    }

    //total vehiculos
    public static function totalDepartamentos(){
        return Departamento::count();
    }

    //total vehiculos
    public static function totalUbicacionesExactas(){
        return UbicacionExacta::count();
    }

    //total conductores
    public static function totalCategorias(){
        return Categoria::count();
    }

    //total conductores
    public static function totalSubCat(){
        return SubCategoria::count();
    }

     //
    public static function totalTipoSubCat(){
        return TipoSubcat::count();
    }

    public static function totalBienes(){
        return Producto::count();
    }

    //bitacora save data
    public static function saveData($registro_id, $tabla, $accion){
        $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $registro_id,
                    'tabla' => $tabla,
                    'accion' => $accion
                ]);

        return $bitacora;
    }
}
