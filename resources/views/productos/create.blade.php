@extends('layouts.app')

@section('content')
	<div class="div-padding col-xs-12 text-uppercase">
		@include('message.message')
		<h1 class="div-blue">Nuevo Producto</h1>
		@include('productos.form', ['productos' => $productos, 'url' => '/productos', 'method'=> 'POST'])
	</div>
@endsection