@extends('layouts.app')

@section('content')
	<div class="div-padding">
		@include('message.message')
		<h1 class="div-blue">Realizar Cambios</h1>
		@include('productos.form', ['productos' => $productos, 'url' => '/productos/'.$productos->id, 'method'=> 'PUT'])
	</div>
@endsection