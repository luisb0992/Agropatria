@extends('layouts.app')

@section('content')
	<div class="div-padding">
		@include('message.message')
		<div class="div-padding gris-claro border-claro">	
		<div class="div-green"><h3>Realizar Cambios</h3></div>
		<br>
		@include('productos.form', ['productos' => $productos, 'url' => '/productos/'.$productos->id, 'method'=> 'PUT'])
		</div>
	</div>
@endsection