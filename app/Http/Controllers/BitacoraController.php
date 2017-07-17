<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bitacora;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $bitacora = Bitacora::latest('id')->get();
        $today = Bitacora::today();
        $departamentos = Bitacora::totalDepartamentos();
        $ubicaciones = Bitacora::totalUbicacionesExactas();
        $categorias = Bitacora::totalCategorias();
        $subcat = Bitacora::totalSubCat();
        $tiposubcat = Bitacora::totalTipoSubCat();
        $bienes = Bitacora::totalBienes();
        
        
        return view('bitacoras.index',[
            'bitacora' => $bitacora,
            'today' => $today,
            'departamentos' => $departamentos,
            'ubicaciones' => $ubicaciones,
            'categorias' => $categorias,
            'subcat' => $subcat,
            'tiposubcat' => $tiposubcat,
            'bienes' => $bienes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'from' =>'required',
            'to' =>'required',
        ]);
        
        $today = Bitacora::today();
        $departamentos = Bitacora::totalDepartamentos();
        $ubicaciones = Bitacora::totalUbicacionesExactas();
        $categorias = Bitacora::totalCategorias();
        $subcat = Bitacora::totalSubCat();
        $tiposubcat = Bitacora::totalTipoSubCat();
        $bienes = Bitacora::totalBienes();

        $desde = date('Y-m-d 00:00:00',strtotime(str_replace('/', '-', $request->from)));
        $hasta = date('Y-m-d 23:59:59',strtotime(str_replace('/', '-', $request->to)));
        $bitacora = Bitacora::whereBetween('created_at',[$desde, $hasta])->get();


         return view('bitacoras.index',[
            'bitacora' => $bitacora,
            'today' => $today,
            'departamentos' => $departamentos,
            'ubicaciones' => $ubicaciones,
            'categorias' => $categorias,
            'subcat' => $subcat,
            'tiposubcat' => $tiposubcat,
            'bienes' => $bienes,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bitacora::destroy($id);
        \Session::flash('message', 'Eliminado con exito!');
        return redirect('bitacora');
    }
}
