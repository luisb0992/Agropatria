@extends('layouts.app')

@section('content')
	<div class="div-padding">
		@include('message.message')
		<h1 class="alert alert-warning">Realizar Cambios</h1>
		@include('materiales.form', ['materiales' => $materiales, 'url' => '/materiales/'.$materiales->id, 'method'=> 'PUT'])
	</div>
	<p class="sale-span">
		<div class="text-right">
			<a href="{{ url('/materiales') }}" class="btn btn-link">Listado de Materiales</a>
			<input type="submit" value="Registro" class="btn btn-warning">
		</div>
	</p>
@endsection