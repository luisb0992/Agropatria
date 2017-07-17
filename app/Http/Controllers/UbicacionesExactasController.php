<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UbicacionExacta;
use App\Bitacora;

class UbicacionesExactasController extends Controller
{
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
            'departamento_id' => 'required',
            'name' =>'required|string|unique:ubicaciones_exactas,name'
        ]);

        $ubicaciones = new UbicacionExacta($request->all());
        $ubicaciones->save();
        Bitacora::saveData($ubicaciones->id, 'ubicacion_exacta', 1);

        return response()->json([
            "mensaje" => "creada con exito"
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
        $ubicacion = UbicacionExacta::find($id);

        return response()->json(
            $ubicacion->toarray()
        );
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
            'departamento_id' => 'required',
            'name' =>'required|string|unique:ubicaciones_exactas,name'
        ]);
        
        $departamento = UbicacionExacta::findOrFail($id);
        $departamento->fill($request->all());
        $departamento->save();
        Bitacora::saveData($departamento->id, 'ubicacion_exacta', 2);

        return response()->json([
            "mensaje" => "Actualizado"
        ]);
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
