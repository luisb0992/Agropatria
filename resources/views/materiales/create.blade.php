@extends('layouts.app')

@section('content')
	<div class="div-padding col-xs-12">
		@include('message.message')
		<h1 class="alert alert-warning">Nuevo Material</h1>
		<p class="sale-span">Seleccione para crear un nuevo conjunto de materiales</p>
		<br>
		@include('materiales.form', ['materiales' => $materiales, 'url' => '/materiales', 'method'=> 'POST'])
	</div>	
@endsection