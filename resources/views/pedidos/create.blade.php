@extends('layouts.app')
@section('content')

<div class="div-padding col-xs-12">
	@include('message.message')
	<h1 class="alert alert-success">Nuevo Pedido</h1>
	<br>
	@include('pedidos.form', ['pedidos' => $pedidos, 'url' => '/pedidos', 'method'=> 'POST'])
</div>

@endsection