<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
use App\Producto;

class TiposController extends Controller
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
        $tipos = Tipo::whereBetween('id',[1,13])->get();
        $nuevostipos = Tipo::where('id','>',13)->latest()->simplePaginate(10);;
        return view('tipos.index',['tipos' => $tipos,'nuevostipos'=>$nuevostipos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = new Tipo;
        return view("tipos.create",["tipos" => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipos = new Tipo;

        $this->validate($request, [
            'name' =>'required|min:5',
            ]);
        $name = strtoupper($request->name);
        $newname = trim($name);
        $query = Tipo::where('name','=', $newname)->value("name");
        if ($query) {
            \Session::flash('error', 'Este tipo ya existe, intente con otro');
            return redirect('tipos/create');
        }else{
            $tipos->name = $newname;
            if ($tipos->save()) {
                \Session::flash('message', 'Nuevo tipo creado con exito!');
                return redirect('tipos');
            }else{
                \Session::flash('error', 'Ocurrio un Problema');
                return redirect('tipos/create');
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
        if (($id>="1") && ($id<="13")) {
            \Session::flash('error', 'No puede eliminar este Tipo!');
            return redirect('/tipos');
        }else{
            Tipo::destroy($id);
            \Session::flash('message', 'Eliminado con exito!');
            return redirect('tipos');
        }
    }
}
