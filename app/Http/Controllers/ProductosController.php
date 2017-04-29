<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Producto;
use App\Estado;
use App\Tipo;
use App\Material;
use App\Ubicacion;

class ProductosController extends Controller
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
        $productos = Producto::latest()->simplePaginate(10);
        return view('productos.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = new Producto;
        $estado = Estado::all();
        $tipo = Tipo::all();
        $material = Material::all();
        $ubicacion = Ubicacion::all();
        return view("productos.create",
                compact('estado','tipo','material','ubicacion'),
                ["productos" => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $productos = new Producto;
        
        /*$rand = mt_rand(1000, 9000).date("i");
        $productos->item = $rand;*/
        $productos->etiqueta = $request->etiqueta;
        $productos->empresa = $request->empresa;
        $productos->estado_id = $request->estado_id;
        $productos->ubicacion_id = $request->ubicacion_id;
        $productos->tipo_id = $request->tipo_id;
        $productos->marca = $request->marca;
        $productos->modelo = $request->modelo;
        $productos->serial = $request->serial;
        $productos->material_id = $request->material_id;
        $productos->descripcion = $request->descripcion;
        $productos->status = $request->status;

        if ($productos->save()) {
            \Session::flash('message', 'Producto creado con exito!');
            return redirect('/productos');
        }else{
            \Session::flash('error', 'Ocurrio un Problema');
            return redirect('productos.create');
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
        $productos = Producto::find($id);
        return view('productos.show',['productos' => $productos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Producto::find($id);     
        $estado = Estado::all();
        $tipo = Tipo::all();
        $material = Material::all();
        return view("productos.edit",
                compact('estado','tipo','material'),
                ["productos" => $productos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $productos = Producto::find($id);
        $productos->etiqueta = $request->etiqueta;
        $productos->empresa = $request->empresa;
        //$productos->estado_id = $request->estado_id;
        //$productos->ubicacion_id = $request->ubicacion_id;
        //$productos->tipo_id = $request->tipo_id;
        $productos->marca = $request->marca;
        $productos->modelo = $request->modelo;
        $productos->serial = $request->serial;
        //$productos->material_id = $request->material_id;
        $productos->descripcion = $request->descripcion;
        $productos->status = $request->status;

        if ($productos->save()) {
              \Session::flash('message', 'Editado con exito!');
              return redirect('productos');
          }else{
                \Session::flash('error', 'Ocurrio un problema!');
                return redirect('productos.edit');
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
        Producto::destroy($id);
        \Session::flash('error', 'Eliminado con exito!');
        return redirect('/productos');
    }

}
