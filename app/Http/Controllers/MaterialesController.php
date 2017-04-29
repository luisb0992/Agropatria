<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Material;

class MaterialesController extends Controller
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
        $materiales = Material::all();
        $materialbase = DB::table('materiales')->whereBetween('id',[2, 16])->get();
        $conjunto = Material::latest()->where('id','>', 16)->simplePaginate(10);
        return view('materiales.index',
            ['materiales' => $materiales,
            'materialbase' => $materialbase, 
            'conjunto' => $conjunto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales = DB::table('materiales')->whereBetween('id',[2, 16])->get();
        $Material = new Material;
        return view("materiales.create",
                ["materiales" => $materiales,"Material" => $Material]);
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
            'name' =>'required',
            ]);
        $materiales = new Material;
        $name = $request->name;
        $implode = implode(' - ', $name);
        $query = DB::table('materiales')->where('name','=', $implode)->value("name");
        if ($query) {
            \Session::flash('error', 'El Conjunto ya existe! elija otra combinacion');
            return redirect('materiales/create');
        }else{
            $materiales->name = $implode;
            if ($materiales->save()) {
                \Session::flash('message', 'Conjunto de materiales creados con exito!');
                return redirect('materiales');
            }else{
                \Session::flash('error', 'Ocurrio un Problema');
                return redirect('materiales/create');
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
        // $materiales = Material::find($id);
        // $Material = Material::all()->where('id','<>', 1);     
        // return view("materiales.edit",
        //         ["materiales" => $materiales, "Material" => $Material]);
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
        // $materiales = new Material;
        // $materiales->name = $request->name;

        // if ($materiales->save()) {
        //     \Session::flash('message', 'Material actualizado con exito!');
        //     return redirect('/materiales');
        // }else{
        //     \Session::flash('error', 'Ocurrio un Problema');
        //     return redirect('materiales/create');
        // }
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
        if (($id>="1") && ($id<="16")) {
            \Session::flash('error', 'No puede eliminar este conjunto de materiales!');
            return redirect('/materiales');
        }else{
            Material::destroy($id);
            \Session::flash('message', 'Eliminado con exito!');
            return redirect('/materiales');
        }
    }
}
