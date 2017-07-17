@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-6 col-xs-12 text-left">
			<a data-toggle="modal" data-target="#modal_create_cat" 
			aria-expanded="false" aria-controls="modal_create_cat"  
			class="btn btn-primary">
				<i class="fa fa-plus" aria-hidden="true"></i> Nueva Categoria
			</a>
			@include('partials.modal_create_cat')
		</div>
		<div class="col-sm-6 col-xs-12 text-left">
			<a data-toggle="modal" data-target="#modal_create_subcat" 
			aria-expanded="false" aria-controls="modal_create_subcat"  
			class="btn btn-info">
				<i class="fa fa-plus" aria-hidden="true"></i> Nueva Sub-Categoria
			</a>
			@include('partials.modal_create_subcat')
		</div>
	</div>
	<br>
	@include('message.mensajes_ajax')
	<div class="row">
		
		<!-- categorias -->
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-primary">			
				<div class="panel-heading"><h3>Categorias</h3></div>			
				<div class="table table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Codigo</th>
								<th>Descripcion</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categorias as $cat)
								<tr class="text-uppercase">
									<td>{{ $cat->codigo }}</td>
									<td>{{ $cat->descripcion }}</td>
									<td class="col-sm-2">
										<button type="button" id="btn_cat" value="{{ $cat->id }}" 
										data-toggle="modal" data-target="#modal_edit_cat" 
										aria-expanded="false" aria-controls="modal_edit_cat" 
										class="btn btn-warning" onclick="MostrarCat(this);">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
										</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@include('partials.modal_edit_cat')
		</div> 

		<!-- sub-categorias  -->
		<div class="col-sm-6">
			<div class="panel panel-info">			
				<div class="panel-heading"><h3>Sub - Categorias</h3></div>			
				<div class="table table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Codigo</th>
								<th>Descripcion</th>
								<th>cod. Categoria</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody id="data">
							@foreach($subcategorias as $subcat)
								<tr class="text-uppercase">
									<td>{{ $subcat->codigo }}</td>
									<td>{{ $subcat->descripcion }}</td>
									<td>{{ $subcat->categoria->codigo }}</td>
									<td class="col-sm-2">
										<button type="button" id="btn_subcat" value="{{ $subcat->id }}" 
										data-toggle="modal" data-target="#modal_edit_subcat" 
										aria-expanded="false" aria-controls="modal_edit_subcat" 
										class="btn btn-warning" onclick="MostrarSubCat(this);">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
										</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@include('partials.modal_edit_subcat')
		</div>
	</div>
	
	<!-- contenedor para tipos de sub-categorias -->
	<div class="row">
		<div class="col-sm-12 col-xs-12 text-left">
			<a data-toggle="modal" data-target="#modal_create_tipo_subcat" 
			aria-expanded="false" aria-controls="modal_create_tipo_subcat"  
			class="btn btn-success">
				<i class="fa fa-plus" aria-hidden="true"></i> Nuevo Tipo de SubCategoria
			</a>
			@include('partials.modal_create_tipo_subcat')
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-success">			
				<div class="panel-heading"><h3>Tipos de Sub - Categorias</h3></div>			
				<div class="table table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Codigo</th>
								<th>Descripcion</th>
								<th>cod. Sub-Categorias</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tipos_subcat as $tipo)
								<tr class="text-uppercase">
									<td>{{ $tipo->codigo }}</td>
									<td>{{ $tipo->descripcion }}</td>
									<td>{{ $tipo->subCategoria->codigo }}</td>
									<td class="col-sm-2">
										<button type="button" id="btn_tipo_subcat" value="{{ $tipo->id }}" 
										data-toggle="modal" data-target="#modal_edit_tipo_subcat" 
										aria-expanded="false" aria-controls="modal_edit_tipo_subcat" 
										class="btn btn-warning" onclick="MostrarTipoSubCat(this);">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
										</button>
									</td>
								</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@include('partials.modal_edit_tipo_subcat')
		</div>
	</div>
	
@endsection

						