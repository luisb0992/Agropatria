<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Users;
use App\Reporte;

class PdfController extends Controller
{

	public function __construct(){
		$this->middleware("auth");
	}

    public function invoice($id) 
    {
        //Instanciar el modelo reporte y obtener el producto seleccionado
        $reporte = new Reporte;
    	$productos = Producto::find($id);

        // Almacenar el user y el producto en la tabla reportes
        $user = Auth::User()->id;
        $user_full_name  = Auth::User()->name." ".Auth::user()->ape;
        $reporte->user_id = $user;
        $reporte->producto_id = $id;
        $reporte->save();

        //concatenar el id y fecha para nombrar los .pdf 
        $dateitem = $productos->id.date('d-m-Y-h:i:s');
        $footer = 'Copyright '.date('Y').' Venezolana de Riego C.A. | All rights reserved.';

        //cargamos un array con la info del producto
        $data = array('Empresa o Dependencia' => 'VENEZOLANA DE RIEGO C.A.',
                        'espacio' => '----------------------------------------------',
                        'Item' => 'Item = '.$productos->id,
                        'Etiqueta' => 'Etiqueta = '.$productos->etiqueta,
                        'Empresa Perteneciente' => 'Empresa Perteneciente = '.$productos->empresa,
                        'Descripcion' => 'Descripcion = '.$productos->descripcion,
                        'Ubicacion' => 'Ubicacion = '.$productos->nameUbicacion(),
                        'Estado' => 'Estado = '.$productos->nameEstado(),
                        'Tipo' => 'Tipo = '.$productos->nameTipo(),
                        'Material' => 'Material = '.$productos->nameMaterial(),
                        'Marca' => 'Marca = '.$productos->nameMarca(),
                        'Modelo' => 'Modelo = '.$productos->nameModelo(),
                        'serial' => 'Serial = '.$productos->nameSerial(),
                        'status' => 'Status = '.$productos->statusProducto(),
                        'Fecha de Creacion' => 'Creacion = '.$productos->formatocreated(),
                        'Ultima Actualizacion' => 'Ultima Actualizacion = '.$productos->formatoupdated(),
                        'Elaborado Por' => 'Elaborado Por = '.$user_full_name,
                        'Fecha' => 'Fecha del reporte = '. date('d-m-Y'), 
                        'espaciofooter' => '----------------------------------------------',
                        'Footer' => $footer
                    ); 

        //transformar la salida en string y pasamos al qr en base64
        $datafinal = implode("\n",$data);
        $qr = \QrCode::format('png')->size(200)->generate($datafinal);
        $base64qr = base64_encode($qr);

        //renderisar la vista a la cual hace referencia el pdf
		$pdf = \PDF::loadView('productos.reporte_unico', 
                        array('productos' => $productos,
                            'base64qr' => $base64qr));
        
		return $pdf->stream($dateitem.'.pdf');
    }

    public function completo(){
        $inventario = Producto::mesActual();
        $dateitem = date('d-m-Y-h:i:s');


        //renderisar la vista a la cual hace referencia el pdf
        $pdf = \PDF::loadView('productos.reporte_general', 
                        array('inventario' => $inventario
                        ));
        
        return $pdf->setPaper('a3','landScape')->stream($dateitem.'.pdf');

    }
}
