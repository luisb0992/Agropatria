<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class InventariosController extends Controller
{
    public function index(){

    	$totalmesanterior = Producto::totalMonthBackCount();
    	$totalMonthCount = Producto::totalMonthCount();
    	$inventario = Producto::dataBienes();
        $count = count($inventario);
    	return view('inventario.index',
    		['inventario' => $inventario,
    		'totalMonthCount' => $totalMonthCount,
    		'totalmesanterior' => $totalmesanterior,
            'count' => $count
    		]);
    }

    public function picker(Request $request){

        $this->validate($request, [
            'from' =>'required',
            'to' =>'required',
        ]);
        $desde = date('Y-m-d 00:00:00',strtotime(str_replace('/', '-', $request->from)));
        $hasta = date('Y-m-d 23:59:59',strtotime(str_replace('/', '-', $request->to)));
        
        $totalmesanterior = Producto::totalMonthBackCount();
        $totalMonthCount = Producto::totalMonthCount();


        $inventario = Producto::whereBetween('created_at',[$desde, $hasta])->get();

        $count = count($inventario);


         return view('inventario.index',[
                    'inventario' => $inventario,
                    'totalmesanterior' => $totalmesanterior,
                    'totalMonthCount' => $totalMonthCount,
                    'count' => $count
        ]);
    }

    public function busquedaBienes($id){
        $producto = Producto::find($id);

        return response()->json([
            "etiqueta" => $producto->etiqueta,
            "departamento_id" => $producto->nameDepartamento(),
            "ubicacion_exacta_id" => $producto->nameUbicacionExacta(),
            "categoria_id" => $producto->nameCategoria(),
            "sub_categoria_id" => $producto->nameSubCategoria(),
            "tipo_subcat_id" => $producto->tipoSubCat->descripcion,
            "marca" => $producto->marca,
            "modelo" => $producto->modelo,
            "serial" => $producto->serial,
            "descripcion" => $producto->descripcion,
            "status_bienes_id" => $producto->nameStatusBienes()
        ]);
    }
}
