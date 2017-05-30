@extends('layouts.app')
@section('content')
	<div class="div-padding col-xs-12">
		@include('message.message')
		<h1 class="alert alert-warning">Nuevo Tipo</h1>
		<br>
		@include('tipos.form', ['tipos' => $tipos, 'url' => '/tipos', 'method'=> 'POST'])
	</div>	
@endsection	