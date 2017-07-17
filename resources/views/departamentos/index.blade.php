@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-6 col-xs-12 text-left">
			<a data-toggle="modal" data-target="#modal_create" 
			aria-expanded="false" aria-controls="modal_create"  
			class="btn btn-primary">
				<i class="fa fa-plus" aria-hidden="true"></i> Nuevo Departamento
			</a>
		@include('partials.modal_create')
		</div>
		<div class="col-sm-6 col-xs-12 text-left">
			<a data-toggle="modal" data-target="#modal_create_ubi" 
			aria-expanded="false" aria-controls="modal_create_ubi"  
			class="btn btn-info">
				<i class="fa fa-plus" aria-hidden="true"></i> Nueva Ubicacion
			</a>
		@include('partials.modal_create_ubi')
		</div>
	</div>
	<br>
	@include('message.mensajes_ajax')
	<div class="row">
		<!--!!!!!!!!!!!!! Departamentos !!!!!!!!!!!!!!-->
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">			
				<div class="panel-heading"><h3>Departamentos</h3></div>			
				<div class="table table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr class="">
								<th>Nombre</th>
								<th>Cant. Ubicaciones</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($departamentos as $dep)
								<tr class="text-uppercase">
									<td>{{ $dep->name }}</td>
									<td class="col-sm-2"><span class="badge">{{ $dep->countUbicaciones($dep->id) }}</span></td>
									<td class="col-sm-2">
										<button type="button" id="btn" value="{{ $dep->id }}" 
										data-toggle="modal" data-target="#modal_edit" 
										aria-expanded="false" aria-controls="modal_edit" 
										class="btn btn-warning" onclick="Mostrar(this);">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
										</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@include('partials.modal_edit')
		</div>
		
		<!--!!!!!!!!!! ubicaciones !!!!!!!!!!!-->
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-info">			
				<div class="panel-heading"><h3>Ubicaciones</h3></div>			
				<div class="table table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr class="">
								<th>Nombre</th>
								<th>Departamento</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($ubicaciones as $ubi)
								<tr class="text-uppercase">
									<td>{{ $ubi->name }}</td>
									<td><span>{{ $ubi->departamento->name }}</span></td>
									<td class="col-sm-2">
										<button type="button" id="btn_ubi" value="{{ $ubi->id }}" 
										data-toggle="modal" data-target="#modal_edit_ubi" 
										aria-expanded="false" aria-controls="modal_edit_ubi" 
										class="btn btn-warning" onclick="MostrarUbi(this);">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
										</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@include('partials.modal_edit_ubi')
		</div>
	</div>
	
@endsection

						