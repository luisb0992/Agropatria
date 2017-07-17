<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\TipoSubcat;
use App\Bitacora;

class TiposSubcatController extends Controller
{

    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'sub_categoria_id' => 'required|numeric',
            'codigo' =>'required|min:4|unique:tipos_subcat,codigo',
            'descripcion' =>'required',
        ]);

        if ($request->ajax()) {
            $tipo = new TipoSubcat($request->all());
            $tipo->save();
            Bitacora::saveData($tipo->id, 'tipo_sub_categoria', 1);
            return response()->json([
                "mensaje" => 'creado con exito!'
            ]);
        }
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
        $tipo = TipoSubcat::findOrFail($id);

        return response()->json($tipo->toarray());
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
       
        $this->validate($request, [
            'sub_categoria_id' => 'required|numeric',
            'codigo' =>'required|min:4|unique:tipos_subcat,codigo,'. $this->route->parameter('tipos_subcat'),
            'descripcion' =>'required',
        ]);

        if ($request->ajax()) {
            $tipo = TipoSubcat::findOrFail($id);
            $tipo->fill($request->all());
            $tipo->save();
            Bitacora::saveData($tipo->id, 'tipo_sub_categoria', 2);
            return response()->json([
                "mensaje" => "Actualizado"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function busquedaTipoSubCat(Request $request, $id){
        if ($request->ajax()) {
            $subcat = TipoSubcat::tipoSubCat($id);
            return response()->json($subcat);
        }
    }
}
