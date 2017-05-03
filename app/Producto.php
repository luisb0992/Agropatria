<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Producto extends Model
{
	protected $table = 'productos';

    protected $fillable = [
        'etiqueta','empresa','estado_id','ubicacion_id','tipo_id',
        'marca','modelo','serial','material_id','descripcion','status'
    ];

    //Relacion con estados del pais
  	public function estados(){

        return $this->belongsTo('App\Estado','estado_id');
     
     }

    //Relacion con tipos/categorias
    public function tipos(){

      return $this->belongsTo('App\Tipo','tipo_id');
   
   }

    //Relacion con materiales de fabricacion
    public function materiales(){

      return $this->belongsTo('App\Material','material_id');
   
   }
    //Relacion con ubicaciones de areas de trabajo
    public function ubicaciones(){

      return $this->belongsTo('App\Ubicacion','ubicacion_id');
   
   }

   //Relacion con reportes
    public function reportes(){

      return $this->hasMany('App\Reporte');
   
   }

   //devulve los nombres de estados
    public function nameEstado(){
      return $this->estados->name;
   }

   //devulve los nombres de tipos
    public function nameTipo(){
      return $this->tipos->name;
   }

    //devulve los nombres de los materiales
    public function nameMaterial(){
      return $this->materiales->name;
   }

    //devulve los nombres de las ubicaciones
    public function nameUbicacion(){
      return $this->ubicaciones->name;
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
  

  // Manejo de status Activo/Inactivo
    public function statusProducto(){
        $status = $this->status;
        if ($status == 1) {
            $status = 'Activo';
        }else{
            $status = 'Inactivo';
        }

        return $status;
    }

    //Manejo de Producto/marca
    public function nameMarca(){
      $marca = $this->marca;
      if (!$marca) {
        $marca = 'Sin Marca';
      }else{
        $marca = $marca;
      }

      return $marca;
    }
   
  //Manejo de Producto/modelo
    public function nameModelo(){
      $modelo = $this->modelo;
      if (!$modelo) {
        $modelo = 'Sin Modelo';
      }else{
        $modelo = $modelo;
      }

      return $modelo;
    }

    //Manejo de Producto/serial
    public function nameSerial(){
      $serial = $this->serial;
      if (!$serial) {
        $serial = 'Sin Serial';
      }else{
        $serial = $serial;
      }

      return $serial;
    }

  //productos por mes actual
    public static function totalMonthCount(){
        return Producto::whereMonth('created_at', date('m'))->count();
    }

  //productos por mes anterior
    public static function totalMonthBackCount(){
        $date = date('m') - 01;
        return Producto::whereMonth('created_at', $date)->count();
    }

  //productos por mes activos
    public static function totalStatusActive(){
        $date = date('m');
        return Producto::where('status','=',1)->whereMonth('created_at', $date)->count();
    }

  //productos por mes inactivos
    public static function totalStatusInactive(){
        $date = date('m');
        return Producto::where('status','=',0)->whereMonth('created_at', $date)->count();
    }

  //productos para mostrar en inventario por mes actual y paginar
    public static function mesActual(){
      $date = date('m');
      return Producto::latest()->whereMonth('created_at', $date)->simplePaginate(15);
    }

}
