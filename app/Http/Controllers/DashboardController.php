<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class DashboardController extends Controller
{
	public function index()
 	{
 		$bienes = Producto::latest()
			 		->get();
		return view("dashboard",["bienes" => $bienes]);
	}

}
