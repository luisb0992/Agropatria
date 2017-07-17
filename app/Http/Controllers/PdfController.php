<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Users;

class PdfController extends Controller
{
    public function invoice($id) 
    {
    	$producto = Producto::findOrFail($id);

        $dateitem = $id.date('d-m-Y-h:i:s');

        //renderisar la vista a la cual hace referencia el pdf
        //y pasar un array como segundo argumento con la data
        $pdf = \PDF::loadView('productos.reporte_unico', 
                        array('producto' => $producto)
                );
        //retornar el pdf con la extension y formato deseado
        return $pdf->stream($dateitem.'.pdf');
    }

    public function completo(){
        $inventario = Producto::mesActual();
        $dateitem = date('d-m-Y-h:i:s');

        //renderisar la vista a la cual hace referencia el pdf
        $pdf = \PDF::loadView('productos.reporte_general', 
                        array('inventario' => $inventario
                        ));
        
        return $pdf->setPaper('a4','landScape')->stream($dateitem.'.pdf');

    }

    //------------ reporte pdf para mes actual
    public function mesActual(){

        $bienes = Producto::mesActual();

        //concatenar el id y fecha para nombrar los .pdf 
        $date = date('M');
        $datehis = date('h:i:s');

        //renderisar la vista a la cual hace referencia el pdf
        $pdf = \PDF::loadView('inventario.reporte_mes_actual',
                        array('bienes' => $bienes)
        );
        
        return $pdf->setPaper('a4','landScape')->download('Reporte del mes '.($date).' - '.$datehis.'.pdf');

    }

    //------------ reporte pdf para mes anterior
    public function mesAnterior(){

        $bienes = Producto::mesAnterior();

        //concatenar el id y fecha para nombrar los .pdf 
        $date = date('m') - 01;
        $datehis = date('h:i:s');

        //renderisar la vista a la cual hace referencia el pdf
        $pdf = \PDF::loadView('inventario.reporte_mes_actual',
                        array('bienes' => $bienes)
        );
        
        return $pdf->setPaper('a4','landScape')->download('Reporte del mes '.($date).' - '.$datehis.'.pdf');

    }


    // reporte general para descargar
    public function downloadGeneral(Request $request){
        $validate = $this->validate($request, [
            'from' =>'required',
            'to' =>'required',
        ]);

        $desde = date('Y-m-d 00:00:00',strtotime(str_replace('/', '-', $request->from)));
        $hasta = date('Y-m-d 23:59:59',strtotime(str_replace('/', '-', $request->to)));

        $bienes = Producto::whereBetween('created_at',[$desde, $hasta])->get();
        $count = $bienes->count();

        if ($count > 1) {
            $date = date('d-m-Y-h:i:s');
            $pdf = \PDF::loadView('inventario.reporte_mes_actual',
                        array('bienes' => $bienes)
            );
            return $pdf->setPaper('a4','landScape')->download('Reporte general '.$date.'.pdf');
        }else{
            \Session::flash('error', 'La cantidad de registros encontrada es '.$count.', intente otra fecha');
            return redirect('inventario');
        }
    }

}
