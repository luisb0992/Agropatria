@extends('layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			@include('inventario.form',['url' => '/busqueda', 'method' => 'POST'])
		</div>
	</div>
	@if($count >= 1)
	<hr>		
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			<h4><span style="padding: 2px; background-color: #444343; border-radius: 40px">{{ $count }}</span> Resultados Encontrados</h4>
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
				@endforeach	
			</table>
		</div>	
	</div>
	<div class="col-md-12">
		<a href="{{ url('pdf/'.$inventario) }}" class="btn btn-danger" target="_blank">
			<i class="fa fa-file-pdf-o"></i>
			PDF General
		</a>
	</div>
	<div class="pull-right">
		<span>{{ $inventario->links() }}</span>
	</div>
	@elseif($count == 0)
	<hr>
	<div class="col-sm-12 alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Sin resultados</h4>
	</div>
	@endif
	<div class="text-right">
		<a href="{{ url('/inventario') }}" class="btn btn-link">Listado de Inventario</a>
	</div>
@endsection
