@extends('layouts.app')
@section('content')
	<div class="">
		<div class="div-padding">
			<div class="col-sm-12">
				<div class="info-box bg-blue">
				  <span class="info-box-icon"><i class="fa fa-database"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Registrados Hoy(Bitacora)</span>
				    <span class="info-box-number">{{ $today }}</span>
				  </div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="info-box">
				  <span class="info-box-icon bg-orange"><i class="fa fa-list-alt"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Total Categorias</span>
				    <span class="info-box-number">{{ $categorias }}</span>
				  </div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="info-box">
				  <span class="info-box-icon bg-orange"><i class="fa fa-list-alt"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Total SubCategorias</span>
				    <span class="info-box-number">{{ $subcat }}</span>
				  </div>
				</div>
			</div>	
			<div class="col-sm-4">
				<div class="info-box">
				  <span class="info-box-icon bg-orange"><i class="fa fa-list-ul"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Total Tipos de SubCategorias</span>
				    <span class="info-box-number">{{ $tiposubcat }}</span>
				  </div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="info-box">
				  <span class="info-box-icon bg-green"><i class="fa fa-dot-circle-o"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Total Departamentos</span>
				    <span class="info-box-number">{{ $departamentos }}</span>
				  </div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="info-box">
				  <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-map-marker"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Total Ubicaciones Exactas</span>
				    <span class="info-box-number">{{ $ubicaciones }}</span>
				  </div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="info-box">
				  <span class="info-box-icon bg-aqua"><i class="fa fa-check-circle"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Total Bienes</span>
				    <span class="info-box-number">{{ $bienes }}</span>
				  </div>
				</div>
			</div>	
		</div>	
	</div>
	<div class="table table-responsive">
		@include('inventario.form',['url' => 'bitacora', 'method' => 'POST'])
		<br>	
		<div class="panel panel-primary">
			<div class="panel-heading"><h3>Registros de Bitacora</h3></div>
			<table class="table table-striped">
				<thead>
					<tr class="text-capitalize gris" id="datatable">
						<td>usuario</td>
						<td>descripcion del registro</td>
						<td>modulo asociado</td>
						<td>accion referenciada</td>
						<td>Fecha</td>
						<td>Eliminar</td>
					</tr>
				</thead>
				<tbody>
					@foreach($bitacora as $bit)
						<tr class="text-capitalize text-peque">

							<td>{{ $bit->username() }}</td>

							<td>
								@if($bit->registro_id)
									@foreach($bit->data() as $datos)
										@if($datos == '')
											<span> Vacio </span>
										@else
										{{ $datos->name }} {{ $datos->ape }} 
										{{ $datos->descripcion }}
										{{ $datos->etiqueta }}
										@endif
									@endforeach
								@endif	
							</td>

							<td>{{ $bit->tabla }}</td>

							<td>
								@if($bit->accion() == 'CREACION')
								<span class="text-primary">{{$bit->accion()}}</span>
								@else
								<span class="text-warning">{{$bit->accion()}}</span>
								@endif
							</td>

							<td>{{ $bit->forcreated() }}</td>

							<td class="text-center">
								<form action="{{ url('/bitacora/'.$bit->id) }}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn-link" type="submit">
										<span class="text-danger">Eliminar</span>
									</button>
								</form>
							</td>

						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection