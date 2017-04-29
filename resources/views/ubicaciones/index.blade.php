@extends('layouts.app')

@section('content')
	@include('message.message')
	<div class="panel panel-warning">
		<div class="panel panel-heading">
				<a class="text-warning" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"  href="#">
				  <h4>Ubicaciones Definidas <i class="fa fa-level-down" aria-hidden="true"></i></h4>
				</a>
		</div>
			<div class="collapse" id="collapseExample">
			    <div class="panel-body div-padding">
					@foreach($ubicacionesbase as $name)
						<div class="col-sm-3"><span class="sale-span">{{$name->name}}</span></div>
					@endforeach
				</div>	
			</div>
	</div>
	<div class="panel panel-warning">			
		<div class="panel panel-heading bg-danger"><h4>Nuevas Ubicaciones</h4></div>			
		<div class="panel-body table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr class="text-nowrap bg-warning text-center">
						<td>Nombre de la ubicacion</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($nuevasubicaciones as $name)
						<tr class="text-center text-nowrap text-uppercase">
							@if(($name->id)>'61')
								<td>{{$name->name}}</td>
								<td>@include('/ubicaciones/delete', ['nuevasubicaciones' => $nuevasubicaciones])</td>
							@else
								<td>Vacio</td>
								<td>vacio</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="div-padding" align="right">
			<div class="pull-left">
				<span>{{ $nuevasubicaciones->links() }}</span>
			</div>
			<a href="{{ url('/ubicaciones/create') }}">
				<button class="btn btn-warning">
						<i class="fa fa-plus" aria-hidden="true"></i>
						Nuevo
				</button>
			</a>
	</div>	
@endsection

						