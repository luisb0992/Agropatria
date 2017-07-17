<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Producto;
use App\Departamento;
use App\UbicacionExacta;
use App\Categoria;
use App\SubCategoria;
use App\TipoSubCat;
use App\StatusBienes;
use App\Responsable;
use App\Bitacora;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::latest()->get();
        $departamentos = Departamento::all('id','name'); 
        $ubiexacta = UbicacionExacta::all('id','name'); 
        $categorias = Categoria::all('id','descripcion');
        $subcat = SubCategoria::all('id','descripcion'); 
        $tiposubcat = TipoSubCat::all('id','descripcion'); 
        $status = StatusBienes::all('id','name'); 

        return view('productos.index',[
            'productos'=>$productos,
            'departamentos'=>$departamentos,
            'ubiexacta'=>$ubiexacta,
            'categorias'=>$categorias,
            'subcat'=>$subcat,
            'tiposubcat'=>$tiposubcat,
            'status'=>$status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = new Producto;
        $departamentos = Departamento::all('id','name'); 
        $categorias = Categoria::all('id','descripcion'); 
        $status = StatusBienes::all('id','name'); 

        return view("productos.create",[
            'productos' => $productos,
            'departamentos' => $departamentos,
            'categorias' => $categorias,
            'status' => $status,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $productos = new Producto($request->all());

        if ($productos->save()) {
            Bitacora::saveData($productos->id, 'bienes', 1);
            $resp = new Responsable();
            $resp->bienes_id = $productos->id;
            $resp->cedula = $request->cedula;
            $resp->name = $request->name;
            $resp->ape = $request->ape;
            $resp->save();
            \Session::flash('message', 'creado con exito!');
            return redirect('/productos');
        }else{
            \Session::flash('error', 'Ocurrio un Problema');
            return redirect('productos/create');
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

        return response()->json($productos->toarray());
            // "etiqueta" => $productos->etiqueta,
            // "departamento_id" => $productos->nameDepartamento(),
            // "ubicacion_exacta_id" => $productos->nameUbicacionExacta(),
            // "categoria_id" => $productos->nameCategoria(),
            // "sub_categoria_id" => $productos->nameSubCategoria(),
            // "tipo_subcat_id" => $productos->tipoSubCat->descripcion,
            // "tipo_subcat_id" => $productos->tipoSubCat->descripcion,
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
        if ($request->ajax()) {
            $productos = Producto::findOrFail($id);
            $productos->fill($request->all());
            $productos->save();
            Bitacora::saveData($productos->id, 'bienes', 2);
            return response()->json([ "mensaje" => "actualizado" ]);
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
        // Producto::destroy($id);
        // \Session::flash('error', 'Eliminado con exito!');
        // return redirect('/productos');
    }

    public function productoStatus(Request $request, $id){
        
        $this->validate($request, [
            'status_bienes_id' =>'required|in:1,2,3,4,5,6,7,8,9,10,11'
        ]);

        if ($request->ajax()) {
            $productos = Producto::findOrFail($id);
            $productos->fill($request->all());
            $productos->save();
            Bitacora::saveData($productos->id, 'bienes', 2);
            return response()->json([ "mensaje" => "actualizado" ]);
        }
    }

}
