@extends('layouts.app')
@section('content')
	@include('message.message')
	<div class="panel table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr class="bg-success text-success">
					<td colspan="6"><h4>PEDIDOS</h4></td>
				</tr>
				<tr class="bg-success">
					<td>Nº PEDIDO</td>
					<td>DESCRIPCION</td>
					<td>UBICACION</td>
					<td>STATUS</td>
					<td>GENERAR PDF</td>
					<td>ACCION</td>
				</tr>
			</thead>
			<tbody>
				@foreach($pedidos as $pedido)
				<tr>
					<td>{{ $pedido->id }}</td>
					<td>{{ $pedido->descripcion }}</td>
					<td>{{ $pedido->nameUbicacion() }}</td>
					@if($pedido->status == 'EN PROCESO')
					<td class="bg-warning">{{ $pedido->status }}</td>
					@else
					<td class="bg-info">{{ $pedido->status }}</td>
					@endif
					<td>
						<a href="{{ url('pdf/pedido/'.$pedido->id) }}" class="btn btn-danger" target="_blank">
							<i class="fa fa-file-pdf-o"></i>
							PDF
						</a>
					</td>
					<td>
						@include('pedidos.delete',['pedidos' => $pedidos])
						<br>
						@if($pedido->status == 'EN PROCESO')
							@include('pedidos.alert',['pedidos' => $pedidos])
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<hr>
	<!--................. boton de creacion ..................-->
	<div class="center-block">
		{{ $pedidos->links() }}
	</div>
	<div class="pull-right">
		<a href="{{ url('pedidos/create') }}" class="btn btn-success">
			<i class="fa fa-plus" aria-hidden="true"></i>
			Nuevo Pedido
		</a>
	</div>

@endsection