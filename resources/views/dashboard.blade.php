@extends('layouts.app')
@section('content')
@if(Auth::user()->status == 1)
	<div class="panel panel-success col-sm-6">
		<div class="panel panel-heading text-center">
			<h4>Ultimos Productos Registrados</h4>
		</div>
		<div class="table-responsive">		
			<table class="table table-bordered div-padding text-uppercase">
					<tr>
						<td>ITEM</td>
						<td>DESCRIPCION</td>
						<td>FECHA</td>
					</tr>
				@foreach($today as $hoy)
					<tr>
						<td><dt>{{$hoy->id}}</dt></td>
						<td><dl class="dl-horizontal"><dt>{{$hoy->descripcion}}</dt></dl></td>
						<td><dt>{{ date('d-m-Y',strtotime(str_replace('/', '-', $hoy->created_at)))}}</dt></td>
					</tr>
				@endforeach	
			</table>
		</div>	
	</div>
	<div class="panel panel-success col-sm-6">
		<div class="panel panel-heading text-center">
			<h4>Ultimos Estados Provenientes</h4>
		</div>		
		<div class="table-responsive">		
			<table class="table table-bordered div-padding text-uppercase">
					<tr>
						<td>ITEM</td>
						<td>ESTADO</td>
						<td>FECHA</td>
					</tr>
				@foreach($today as $hoy)
					@if(!$hoy->id)
					<tr>
						<td>vacio</td>
						<td>vacio</td>
						<td>vacio</td>
					</tr>
					@else
					<tr>
						<td><dt>{{$hoy->id}}</dt></td>
						<td><dt>{{$hoy->nameEstado()}}</dt></td>
						<td><dt>{{ $hoy->formatocreated() }}</dt></td>
					</tr>
					@endif
				@endforeach	
			</table>
		</div>	
	</div>
	<hr>
	<div class="panel panel-success col-sm-12">
		<div class="panel panel-heading text-center">
			<h4>Ultimos Productos Ubicados</h4>
		</div>		
		<div class="table-responsive">		
			<table class="table table-bordered div-padding text-uppercase">
					<tr>
						<td>ITEM</td>
						<td>DESCRIPCION</td>
						<td>UBICACION</td>
						<td>FECHA</td>
					</tr>
				@foreach($today as $hoy)
					@if(!$hoy->id)
					<tr>
						<td>vacio</td>
						<td>vacio</td>
						<td>vacio</td>
						<td>vacio</td>
					</tr>
					@else
					<tr>
						<td><dt>{{$hoy->id}}</dt></td>
						<td><dl class="dl-horizontal"><dt>{{$hoy->descripcion}}</dt></dl></td>
						<td><dt>{{$hoy->nameUbicacion()}}</dt></td>
						<td><dt>{{ $hoy->formatocreated() }}</dt></td>
					</tr>
					@endif
				@endforeach	
			</table>
		</div>	
	</div>
@else
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<span>Temporalmente usuario Inactivo</span>
	</div>
@endif	
@endsection



