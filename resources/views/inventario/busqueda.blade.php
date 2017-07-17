@extends('layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-8">
			@include('inventario.form',['url' => '/busqueda', 'method' => 'POST'])
		</div>
	</div>
	@if($count >= 1)
	<hr>		
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			<h4><span style="padding: 2px; background-color: #444343; border-radius: 40px">{{ $count }}</span> Resultados Encontrados</h4>
		</div>
		<div class="table table-responsive">		
			<table class="table table-bordered table-striped">
				<thead>
					<tr class="text-uppercase">
						<th>Etiqueta</th>
						<th>Departamento</th>
						<th>Ubicacion exacta</th>
						<th>Tipo de SubCategoria</th>
						<th>Responsable</th>
						<th>Fecha de registro</th>
						<th>Ultima actualizacion</th>
						<th>Vista detallada</th>
						<th>REPORTE</th>
					</tr>
				</thead>
				<tbody>	
					@foreach($inventario as $bienes)
					<tr>
						<td>{{ $bienes->etiqueta }}</td>
						<td>{{ $bienes->nameDepartamento() }}</td>
						<td>{{ $bienes->nameUbicacionExacta() }}</td>
						<td>{{ $bienes->TipoSubCat->descripcion }}</td>
						<td>{{ $bienes->responsable->name.' '.$bienes->responsable->ape }}</td>
						<td>{{ $bienes->formatocreated() }}</td>
						<td>{{ $bienes->formatoupdated() }}</td>
						<td>
							<button type="button" id="btn_datos_bienes" value="{{ $bienes->id }}" 
							data-toggle="modal" data-target="#modal_datos_bienes" 
							aria-expanded="false" aria-controls="modal_datos_bienes" 
							class="btn btn-default" onclick="MostrarDatosBienes(this);">
								<span class="">
									<i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i> VER
								</span>	
							</button>
						</td>
						<td>
							<a href="{{ url('pdf/'.$bienes->id) }}" class="btn btn-danger" target="_blank">
							<i class="fa fa-file-pdf-o"></i>
								PDF
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>		
			</table>
		</div>	
	</div>
	@include('partials.modal_datos_bienes')
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

@section('script')
	<script>
		function MostrarDatosBienes(btn_datos_bienes){
		   var ruta = "busqueda_bienes/"+btn_datos_bienes.value+"";

		  $.get(ruta, function(res){
		    $("#etiqueta").html("<span>"+res.etiqueta+"</span>");
		    $("#departamento_id").html("<span>"+res.departamento_id+"</span>");
		    $("#ubicacion_exacta_id").html("<span>"+res.ubicacion_exacta_id+"</span>");
		    $("#categoria_id").html("<span>"+res.categoria_id+"</span>");
		    $("#sub_categoria_id").html("<span>"+res.sub_categoria_id+"</span>");
		    $("#tipo_subcat_id").html("<span>"+res.tipo_subcat_id+"</span>");
		    $("#marca").html("<span>"+res.marca+"</span>");
		    $("#modelo").html("<span>"+res.modelo+"</span>");
		    $("#serial").html("<span>"+res.serial+"</span>");
		    $("#descripcion").html("<span>"+res.descripcion+"</span>");
		    $("#status_bienes_id").html("<span>"+"EN "+res.status_bienes_id+"</span>");
		  });
		}
	</script>
@endsection
