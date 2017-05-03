<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ubicacion;

class UbicacionesController extends Controller
{

    public function __construct(){
      $this->middleware(['auth','role.user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicacionesbase = DB::table('ubicaciones')->whereBetween('id',[1, 61])->get();
        $nuevasubicaciones = Ubicacion::where('id','>', 61)->latest()->simplePaginate(10);;
        return view('ubicaciones.index',
            ['ubicacionesbase' => $ubicacionesbase,'nuevasubicaciones' => $nuevasubicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ubicacion = new Ubicacion;
        return view("ubicaciones.create",
                ["ubicacion" => $ubicacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ubicaciones = new Ubicacion;

        $this->validate($request, [
            'name' =>'required|min:5',
            ]);

        $name = strtoupper($request->name);
        $namecompleto = trim($name);
        $query = DB::table('ubicaciones')->where('name','=', $namecompleto)->value("name");
        if ($query) {
            \Session::flash('error', 'Esta ubicacion ya existe!');
            return redirect('ubicaciones/create');
        }else{
            $ubicaciones->name = $namecompleto;
            if ($ubicaciones->save()) {
                \Session::flash('message', 'Ubicacion creada con exito!');
                return redirect('ubicaciones');
            }else{
                \Session::flash('error', 'Ocurrio un Problema');
                return redirect('ubicaciones/create');
            }
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
        $ubicaciones = Ubicacion::find($id);
        //$Material = Material::all()->where('id','<>', 1);     
        return view("ubicaciones.edit",
                ["ubicaciones" => $ubicaciones]);
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
        $ubicaciones = Ubicacion::find($id);
        $name = $request->name;
        $namecompleto = trim($name);
        $query = DB::table('ubicaciones')->where('name','=', $namecompleto)->value("name");
        if ($query) {
            \Session::flash('error', 'Esta ubicacion ya existe!');
            return redirect('ubicaciones/edit');
        }else{
            $ubicaciones->name = $namecompleto;
            if ($ubicaciones->save()) {
                \Session::flash('message', 'Ubicacion creada con exito!');
                return redirect('ubicaciones');
            }else{
                \Session::flash('error', 'Ocurrio un Problema');
                return redirect('ubicaciones/edit');
            }
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
        //dd($id);
        if (($id>="1") && ($id<="61")) {
            \Session::flash('error', 'No puede eliminar esta ubicacion!');
            return redirect('/ubicaciones');
        }else{
            Ubicacion::destroy($id);
            \Session::flash('message', 'Eliminado con exito!');
            return redirect('/ubicaciones');
        }
    }
}
