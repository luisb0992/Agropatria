<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;

class QRController extends Controller
{
    public function mostrarQR($id){
        
        $data = Producto::datosQR($id);

        //transformar la salida en string 
        $datafinal = implode("\n",$data);
        $qr = \QrCode::size(300)->generate($datafinal);

        return response()->json($qr);
        
    }

    public function descargarQR($id){
        $data = Producto::datosQR($id);
        $name = $id.date('d-m-Y-h:i:s');
        $datafinal = implode("\n",$data);
        $qr = \QrCode::format('png')->size(300)->generate($datafinal);
        $base64qr = base64_encode($qr);

        //renderisar la vista a la cual hace referencia el pdf
        $pdf = \PDF::loadView('productos.QR_Download', 
                        array('base64qr' => $base64qr));
        
        return $pdf->setPaper('a6')->download($name.'.pdf');
    }
}

        