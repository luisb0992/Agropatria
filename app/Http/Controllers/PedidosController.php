<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\Ubicacion;

class PedidosController extends Controller
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
        $pedidos = Pedido::latest('id')->simplePaginate(20);
        return view('pedidos.index',['pedidos' => $pedidos]);
    }

    public function create(){

        $pedidos = new Pedido;
        $ubicaciones = Ubicacion::all();

        return view('pedidos.create',[
            'pedidos' => $pedidos,
            'ubicaciones' => $ubicaciones
        ]); 
    }


    public function store(Request $request)
    {

        $this->validate($request,[
        'descripcion' => 'required',
        'ubicacion_id' => 'required',
        ]);

        $pedidos = new Pedido;
        $pedidos->descripcion = strtoupper($request->descripcion);
        $pedidos->user_id = \Auth::user()->id;
        $pedidos->ubicacion_id = $request->ubicacion_id;
        $pedidos->status = strtoupper('en proceso');

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
       $pedido = Pedido::find($id);

        if ($pedido->status == 'EN PROCESO') {
            $pedido->status = 'SOLICITUD PROCESADA';
            $pedido->save();

            \Session::flash('message', 'Procesada con exito');
            return redirect('pedidos');
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
        Pedido::destroy($id);
        \Session::flash('message', 'Eliminado con exito!');
        return redirect('pedidos');
    }
}
