<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Users;

class LoginController extends Controller
{
	public function index(){
		$user = Users::count();

		return view('main', ['user' => $user]);
	}

	
	 public function login()
	 {
	 	/*----------- LOGIN MANUAL , MODIFICABLE ----------*/

	 	//attemp suelta un booleano
    	//dd($request->all());

    	$this->validate($request, [

    		'email' =>'required|email',
    		'password' => 'required|max:30',

    		]);

    	$email = $request->email;
    	$pass = $request->password;

	        if (Auth::attempt(['email' => $email , 'pass' => $pass]))
	        {
	        	return redirect()->intended('dashboard');
	            
	        }else{

	        	return redirect('/')->withErrors('Verifique sus credenciales');
	        }
	 }

	 public function logout()
	 {
	 	/*---- funcion de salir/logout/cerrar sesion --*/
	 	Auth::logout();
	 	return view('/');

	 }
    
}
