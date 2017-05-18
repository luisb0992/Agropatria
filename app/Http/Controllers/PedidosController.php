<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pedido;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();

        return view('pedidos.index',['pedidos' => $pedidos]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedidos = new Pedido;

        return view('pedidos.create',['pedidos' => $pedidos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedidos = new Pedido;

        $pedidos->descripcion = strtoupper($request->descripcion);
        $pedidos->user_id = \Auth::user()->id;
        $pedidos->ubicacion_id = $request->ubicacion_id;
        $pedidos->status = $request->status;

        if ($pedidos->save()) {
            \Session::flash('message', 'Pedido creado');
            return redirect('/pedidos');
        }else{
            \Session::flash('error', 'Ocurrio un Problema');
            return redirect('pedidos.create');
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
        Pedido::destroy($id);
        \Session::flash('message', 'Eliminado con exito!');
        return redirect('pedidos');
    }
}
