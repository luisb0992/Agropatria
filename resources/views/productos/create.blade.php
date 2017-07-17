@extends('layouts.app')

@section('content')
	<div class="col-xs-12 text-uppercase">
		@include('message.message')
		<div class="div-padding gris-claro border-claro">	
		<div class="div-green"><h3>Nuevo</h3></div>
		<br>
		@include('productos.form', ['productos' => $productos, 'url' => '/productos', 'method'=> 'POST'])
		</div>
	</div>
@endsection