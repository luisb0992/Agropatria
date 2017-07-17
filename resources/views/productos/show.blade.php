@extends('layouts.app')
@section('content')	
<div class="div-padding">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>Etiqueta: <span>{{ $productos->etiqueta }}</span></h3>
		</div>
		<div class="panel-body text-left">
			<div class="row">
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Departamento</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->nameDepartamento() }}</p>
					</div>
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Ubicacion Exacta</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->nameUbicacionExacta() }}</p>
				</div>
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Categoria</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->nameCategoria() }}</p>
				</div>
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Sub-Categoria</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->nameSubCategoria() }}</p>
				</div>
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Tipo de Sub-Categoria</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->tipoSubCat->descripcion }}</p>
				</div>
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Marca</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->nameMarca() }}</p>
				</div>
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Modelo</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->nameModelo() }}</p>
				</div>
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Serial</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->nameSerial() }}</p>
				</div>
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Status</b></p> 
					<p class="list-group-item list-group-item-heading">EN {{ $productos->nameStatusBienes() }}</p>
				</div>
				<div class="col-sm-6">
					<p class="list-group-item list-group-item-info"><b>Descripcion</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->descripcion }}</p>
				</div>
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-info"><b>Creado el:</b></p>
				 	<p class="list-group-item list-group-item-heading">{{ $productos->formatocreated() }}</p>
				 </div>
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-info"><b>Ultima Actualizacion:</b></p>
				 	<p class="list-group-item list-group-item-heading">{{ $productos->formatoupdated() }}</p>
				</div>

				<div class="text-left col-sm-12">
					@include('message.mensajes_ajax')
					<h3><span class="text-primary"><i class="glyphicon glyphicon-user"></i></span>Responsable
						<button type="button" id="btn_resp" value="{{ $productos->responsable->id }}" 
						data-toggle="modal" data-target="#modal_edit_resp" 
						aria-expanded="false" aria-controls="modal_edit_resp" 
						class="btn " onclick="MostrarResp(this);">
							<span class="text-warning">
								<i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
								Editar
							</span>	
						</button>
					</h3>	
						@include('partials.modal_edit_resp')
				</div>

				<div class="col-sm-3">
					<p class="list-group-item list-group-item-info"><b>Cedula</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->responsable->cedula }}</p>
				</div>
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-info"><b>Nombre Y Apellido</b></p> 
					<p class="list-group-item list-group-item-heading">{{ $productos->responsable->name.' '.$productos->responsable->ape }}</p>
				</div>
				<!-- <div class="col-sm-6 text-right">
					<p>
						<a href="{{ url('pdf/'.$productos->id) }}" class="btn btn-danger" target="_blank">
						<i class="fa fa-file-pdf-o"></i>
						PDF
						</a>
					</p>
				</div> -->
			</div>
		</div>
	</div>	
	<div class="text-left"><a href="{{ url('/productos') }}" class="btn btn-link">Listado de Bienes</a></div>											
</div>
@endsection