<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\SubCategoria;
use App\TipoSubcat;
use App\Bitacora;

class SubCategoriasController extends Controller
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
            'codigo' =>'required|min:4|unique:sub_categorias,codigo',
            'descripcion' =>'required',
            'categoria_id' =>'required|numeric',
        ]);

        if ($request->ajax()) {
            $subcat = new SubCategoria($request->all());
            $subcat->save();
            Bitacora::saveData($subcat->id, 'sub_categoria', 1);
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
        $subcat = SubCategoria::find($id);

        return response()->json($subcat->toarray());
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
            'codigo' =>'required|min:4|unique:sub_categorias,codigo,'. $this->route->parameter('sub_categoria'),
            'descripcion' =>'required',
            'categoria_id' =>'required|numeric',
        ]);

        if ($request->ajax()) {
            $subcat = SubCategoria::find($id);
            $subcat->fill($request->all());
            $subcat->save();
            Bitacora::saveData($subcat->id, 'sub_categoria', 2);
            return response()->json([
                "mensaje" => 'Actualizado con exito!'
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
}
