<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Producto;
use App\Categoria;
use App\SubCategoria;
use App\TipoSubcat;
use App\Bitacora;

class CategoriasController extends Controller
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
        $subcategorias = SubCategoria::latest()->get();
        $tipos_subcat = TipoSubcat::latest()->get();
        $categorias = Categoria::latest()->get();
        return view('categorias.index',[
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'tipos_subcat' => $tipos_subcat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tipos = new Tipo;
        // return view("tipos.create",["tipos" => $tipos]);
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
            'codigo' =>'required|min:4|unique:categorias,codigo',
            'descripcion' =>'required',
        ]);

        if ($request->ajax()) {
            $categorias = new Categoria($request->all());
            $categorias->save();
            Bitacora::saveData($categorias->id, 'categoria', 1);
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
        $categoria = Categoria::find($id);
        return response()->json(
            $categoria->toarray()
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
            'codigo' =>'required|min:4|unique:categorias,codigo,'. $this->route->parameter('categoria'),
            'descripcion' =>'required',
        ]);

        if ($request->ajax()) {
            $categoria = Categoria::findOrFail($id);
            $categoria->fill($request->all());
            $categoria->save();
            Bitacora::saveData($categoria->id, 'categoria', 2);
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
        // if (($id>="1") && ($id<="13")) {
        //     \Session::flash('error', 'No puede eliminar este Tipo!');
        //     return redirect('/tipos');
        // }else{
        //     Tipo::destroy($id);
        //     \Session::flash('message', 'Eliminado con exito!');
        //     return redirect('tipos');
        // }
    }

    public function busquedaSubCat(Request $request, $id){
        if ($request->ajax()) {
            $subcat = SubCategoria::busquedaDeSubCategorias($id);
            return response()->json($subcat);
        }
    }
}
