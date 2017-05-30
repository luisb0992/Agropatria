<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Users;

class UsersController extends Controller
{

    public function __construct(){
      $this->middleware(['auth','role.admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = \Auth::user()->id;
        $users = Users::where('id','<>',$user_id)->latest()->simplePaginate(10);
        return view('users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = new Users;
        return view("users.create",["users" => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
      $users = new Users;

      //$product->user_id = auth::user()->id;
      $users->cedula = $request->cedula;
      $users->name = strtoupper($request->name);
      $users->ape = strtoupper($request->ape);
      $users->email = strtoupper($request->email);
      $users->direccion = strtoupper($request->direccion);
      $newfecha = date('Y-m-d',strtotime(str_replace('/', '-', $request->fechanac)));
      $users->fechanac = $newfecha;
      $users->perfil_id = $request->perfil_id;
      $users->password = bcrypt($request->password);
      $users->status = $request->status;

      if ($users->save()) {
            \Session::flash('message', 'Usuario creado con exito!');
            return redirect('/users');
      }else{
            \Session::flash('error', 'Sucedio un error!');
            return redirect('users.create');
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
       $users = Users::find($id);  
        return view('users.show', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = Users::find($id);
        return view("users.edit",["users" => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
          $users = Users::find($id);
          $users->cedula = $request->cedula;
          $users->name = strtoupper($request->name);
          $users->ape = strtoupper($request->ape);
          $users->email = strtoupper($request->email);
          $users->direccion = strtoupper($request->direccion);
          $newfecha = date('Y-m-d',strtotime(str_replace('/', '-', $request->fechanac)));
          $users->fechanac = $newfecha;
          $users->perfil_id = $request->perfil_id;
          $users->status = $request->status;

          if ($users->save()) {
              \Session::flash('message', 'Editado con exito!');
              return redirect('users');
          }else{
                return redirect('users.edit');
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
        Users::destroy($id);
        \Session::flash('message', 'Eliminado con exito!');
        return redirect('/users');
    }
}
