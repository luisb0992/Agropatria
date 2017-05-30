@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			@include('inventario.form',['url' => '/busquedareporte', 'method' => 'POST'])
		</div>
	</div>
	<hr>	
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			<h4>REPORTES</h4>
		</div>
		<div class="table-responsive">		
			<table class="table table-bordered div-padding text-uppercase">
					<tr>
						<td>ITEM</td>
						<td>FECHA DEL REPORTE</td>
						<td>Usuario</td>
					</tr>
				@foreach($data as $datos)
					<tr>
						<td><dt>{{$datos->producto_id}}</dt></td>
						<td><dt>{{ $datos->formatocreated() }}</dt></td>
						<td>{{ $datos->nameUser() }}</td>
					</tr>
				@endforeach	
			</table>
		</div>	
	</div>
	<div class="text-left">
		<a href="{{ url('/inventario') }}" class="btn btn-link">Listado de Inventario</a>
	</div>
	<div class="pull-right">
		<span>{{ $data->links() }}</span>
	</div>
@endsection
