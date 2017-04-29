@extends('layouts.app')

@section('content')
	<div class="div-padding col-xs-12">
		@include('message.message')
		<h1 class="alert alert-warning">Nueva Ubicacion</h1>
		@include('ubicaciones.form', ['ubicacion' => $ubicacion, 'url' => '/ubicaciones', 'method'=> 'POST'])
	</div>
@endsection