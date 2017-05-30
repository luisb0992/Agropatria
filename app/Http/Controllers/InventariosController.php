<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Reporte;

class InventariosController extends Controller
{
	public function __construct(){
      $this->middleware(['auth','role.admin']);
    }

    public function index(){

    	$totalstatusinactivos = Producto::totalStatusInactive();
    	$totalstatusactivos = Producto::totalStatusActive();
    	$totalmesanterior = Producto::totalMonthBackCount();
    	$totalMonthCount = Producto::totalMonthCount();
    	$inventario = Producto::mesActual();
        $count = count($inventario);
    	return view('inventario.index',
    		['inventario' => $inventario,
    		'totalMonthCount' => $totalMonthCount,
    		'totalmesanterior' => $totalmesanterior,
    		'totalstatusactivos' => $totalstatusactivos,
    		'totalstatusinactivos' => $totalstatusinactivos,
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

        $inventario = Producto::whereBetween('created_at',[$desde, $hasta])->simplePaginate(20);

        $count = count($inventario);


         return view('inventario.busqueda',
                    ['inventario' => $inventario,
                    'count' => $count
                    ]);
    }

    public function reporteusers(){

        $data = Reporte::orderBy('id','DESC')
                    ->simplePaginate(20);


        return view('inventario.reporteusers',
                    ['data' => $data,
                    ]);
    }

    public function pickerReporte(Request $request){
        $this->validate($request, [
            'from' =>'required',
            'to' =>'required',
            ]);
        $from = $request->from;
        $to = $request->to;
        $desde = date('Y-m-d 00:00:00',strtotime(str_replace('/', '-', $from)));
        $hasta = date('Y-m-d 23:59:59',strtotime(str_replace('/', '-', $to)));

        $data = Reporte::with('productos','users')
                    ->whereBetween('created_at',[$desde, $hasta])
                    ->orderBy('id','DESC')
                    ->simplePaginate(20);

        $count = count($data);

         return view('inventario.busquedareporte',
                    ['data' => $data,
                    'count' => $count,
                    'from' => $from,
                    'to' => $to
                    ]);
    }
}
