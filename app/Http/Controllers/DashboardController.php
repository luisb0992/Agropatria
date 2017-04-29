<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Producto;
use App\Estado;

class DashboardController extends Controller
{
	public function __construct(){
		$this->middleware(["auth"]);
	}

	public function index()
 	{
 		$today = Producto::with('estados')
			 		->orderBy('id','DESC')
			 		->limit(5)
			 		->get();
		return view("dashboard",["today" => $today]);
	}

}
