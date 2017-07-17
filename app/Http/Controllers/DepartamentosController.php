<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Departamento;
use App\UbicacionExacta;
use App\Bitacora;

class DepartamentosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::latest()->get();
        $ubicaciones = UbicacionExacta::latest()->get();
        return view('departamentos.index',[
            'departamentos' => $departamentos,
            'ubicaciones' => $ubicaciones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $departamentos = new Departamento;
        // return view("departamentos.create",
        //         ["departamentos" => $departamentos]);
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
            'name' =>'required|string|unique:departamentos,name'
        ]);

        $departamento = new Departamento($request->all());
        $departamento->save();

        Bitacora::saveData($departamento->id, 'departamento', 1);

        return response()->json([
            "mensaje" => "listo"
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
        $departamento = Departamento::find($id);
        return response()->json(
            $departamento->toarray()
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
            'name' =>'required|string|unique:departamentos,name'
        ]);
        $departamento = Departamento::findOrFail($id);
        $departamento->fill($request->all());
        $departamento->save();

        Bitacora::saveData($departamento->id, 'departamento', 2);

        return response()->json([
            "mensaje" => "listo"
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
        //dd($id);
        // if (($id>="1") && ($id<="61")) {
        //     \Session::flash('error', 'No puede eliminar esta ubicacion!');
        //     return redirect('/ubicaciones');
        // }else{
        //     Departamento::destroy($id);
        //     \Session::flash('message', 'Eliminado con exito!');
        //     return redirect('/ubicaciones');
        // }
    }

    public function busquedaDep(Request $request, $id){
        if ($request->ajax()) {
            $dep = UbicacionExacta::busqueda_dep($id);
            return response()->json($dep);
        }
    }
}
