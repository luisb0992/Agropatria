@extends('layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-8">
			@include('inventario.form',['url' => '/busqueda', 'method' => 'POST'])
		</div>
		<div class="col-sm-4">
			<a href="{{ url('inventario/reporteusers') }}" class="btn btn-success pull-right">
				Reportes de Usuarios
			</a>
		</div>
	</div>
	<hr>
	<div class="panel panel-success">
		<div class="panel-heading text-center">
			<h4>Productos adquiridos</h4>
		</div>
		<div class="row div-padding">
			<div class="col-xs-12 col-md-3 sale-data">
				<span class="sale-span" style="font-size: 24px; color: #018E22">{{ $totalmesanterior }}</span>
				Mes anterior
			</div>
			<div class="col-xs-12 col-md-3 sale-data">
				<span class="sale-span" style="font-size: 24px; color: #018E22">{{ $totalMonthCount }}</span>
				Mes actual
			</div>
			<div class="col-xs-12 col-md-3 sale-data">
				<span class="sale-span" style="font-size: 24px; color: #0E19EE">{{ $totalstatusactivos }}</span>
				Activos 
			</div>
			<div class="col-xs-12 col-md-3 sale-data">
				<span class="sale-span" style="font-size: 24px; color: #D00909">{{ $totalstatusinactivos }}</span>
				Inactivos
			</div>
		</div>	
		<div class="table-responsive">		
			<table class="table table-bordered div-padding text-uppercase">
					<tr>
						<td>ITEM</td>
						<td>EMPRESA</td>
						<td>DESCRIPCION</td>
						<td>FECHA</td>
						<td>REPORTE</td>
					</tr>
				@foreach($inventario as $mes)
					@if(!$mes->id)
					<tr>
						<td>vacio</td>
						<td>vacio</td>
						<td>vacio</td>
						<td>vacio</td>
					</tr>
					@else
					<tr>
						<td><dt>{{$mes->id}}</dt></td>
						<td><dt>{{$mes->empresa}}</dt></td>
						<td><dl class="dl-horizontal"><dt>{{$mes->descripcion}}</dt></dl></td>
						<td><dt>{{ $mes->formatocreated() }}</dt></td>
						<td>
							<a href="{{ url('pdf/'.$mes->id) }}" class="btn btn-danger" target="_blank">
							<i class="fa fa-file-pdf-o"></i>
								PDF
							</a>
						</td>
					</tr>
					@endif
				@endforeach	
			</table>
		</div>	
	</div>
	@if($count > 1)
	<div class="col-md-12">
		<a href="{{ url('pdf/'.$inventario) }}" class="btn btn-danger" target="_blank">
			<i class="fa fa-file-pdf-o"></i>
			PDF General
		</a>
	</div>
	@else
	<div class="col-sm-12 alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Ningun producto registrado este mes</h4>
	</div>
	@endif
	<div class="pull-right">
		<span>{{ $inventario->links() }}</span>
	</div>
@endsection
