<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Producto extends Model
{
	protected $table = 'bienes';

    protected $fillable = [
        'etiqueta','departamento_id','ubicacion_exacta_id','categoria_id','sub_categoria_id',
        'marca','modelo','serial','descripcion','status_bienes_id','tipo_subcat_id'
    ];


    //-------------------- relkaciones -------------//
    public function categorias(){

      return $this->belongsTo('App\Categoria','categoria_id');
   
   }

    public function subCategorias(){

      return $this->belongsTo('App\SubCategoria','sub_categoria_id');
   
   }

   public function tipoSubCat(){

      return $this->belongsTo('App\TipoSubcat','tipo_subcat_id');
   
   }

    public function departamentos(){

      return $this->belongsTo('App\Departamento','departamento_id');
   
   }

   public function ubicacionExata(){

      return $this->belongsTo('App\UbicacionExacta','ubicacion_exacta_id');
   
   }

   public function statusBienes(){

      return $this->belongsTo('App\StatusBienes','status_bienes_id');

   }

   public function responsable(){

      return $this->hasOne('App\Responsable','bienes_id');
   }
   //------ fin de laas relaciones

  //--------------------------------------------------------------------//

  //-------- Metodos para obstencion de datos

  public function nameCategoria(){
      return $this->categorias->descripcion;
  }

  public function nameSubCategoria(){
      return $this->subCategorias->descripcion;
  }

  public function nameDepartamento(){
      return $this->departamentos->name;
  }

  public function nameUbicacionExacta(){
      return $this->ubicacionExata->name;
  }

  public function nameStatusBienes(){
      return $this->statusBienes->name;
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

  //productos para mostrar en inventario por mes actual y paginar
  public static function mesActual(){
    $date = date('m');
    return Producto::latest()->whereMonth('created_at', $date)->get();
  }

  //productos para mostrar en inventario por mes actual y anterior
  public static function mesAnterior(){
    $date = date('m') - 01;
    return Producto::latest()->whereMonth('created_at', $date)->get();
  }

  //todos los productos
  public static function dataBienes(){
    return Producto::latest()->get();
  }

  public static function datosQR($id){
    
    $producto = Producto::findOrFail($id);
    $footer = 'Copyright '.date('Y').' Venezolana de Riego C.A. | All rights reserved.';

    //cargamos un array con la info del producto
    $data = array(
                    'Empresa o Dependencia' => 'VENEZOLANA DE RIEGO C.A.',
                    'espacio' => '----------------------------------------------',
                    'Etiqueta' => 'Etiqueta = '.$producto->etiqueta,
                    'Departamento' => 'Departamento = '.$producto->nameDepartamento(),
                    'Ubicacion Exacta' => 'Ubicacion Exacta = '.$producto->nameUbicacionExacta(),
                    'Tipo SubCategoria' => 'Tipo SubCategoria = '.$producto->tipoSubCat->descripcion,
                    'status' => 'Status = '.$producto->nameStatusBienes(),
                    'Fecha de Creacion' => 'Fecha Registro = '.$producto->formatocreated(),
                    'espaciofooter' => '----------------------------------------------',
                    'Footer' => $footer
    );
    return $data; 
  }

}
