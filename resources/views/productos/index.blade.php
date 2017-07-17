@extends('layouts.app')

@section('content')
	<div class="col-sm-12 text-left">
		<a href="{{ url('/productos/create') }}">
			<button class="btn btn-primary btn-lg">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Nuevo
			</button>
		</a>
	</div>
	@if(count($productos) > 0)
	<div class="col-sm-12">
		@include('message.message')
		@include('message.mensajes_ajax')
	</div>
	<div class="table table-responsive">
		<caption ><h3 class="div-blue">Bienes Nacionales</h3></caption>
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>Etiqueta</th>
					<th>Departamento</th>
					<th>Ubicacion Exacta</th>
					<th>Tipo SubCategoria</th>
					<th>Status</th>
					<th>Codigo Qr</th>
					<th>Reporte</th>
					<th>Ver</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($productos as $producto)
				<tr>

					<td>{{ $producto->etiqueta }}</td>

					<td>{{ $producto->nameDepartamento() }}</td>

					<td>{{ $producto->nameUbicacionExacta() }}</td>

					<td>{{ $producto->tipoSubCat->descripcion }}</td>
					
					<!-- mostrar y cambiar status por medio del modal -->
					<td>
						 <span class="">EN {{ $producto->nameStatusBienes() }}</span>
						<button type="button" id="btn_status" value="{{ $producto->id }}" 
						data-toggle="modal" data-target="#modal_edit_status" 
						aria-expanded="false" aria-controls="modal_edit_status" 
						class="btn pull-right btn-default" onclick="MostrarStatus(this);">
							<span class="">
								<i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
							</span>	
						</button>
					</td>
					
					<!-- mostrar y descargar QR -->
					<td class="text-center">
						<button type="button" id="btn_QR" value="{{ $producto->id }}" 
						data-toggle="modal" data-target="#modal_QR" 
						aria-expanded="false" aria-controls="modal_QR" 
						class="btn btn-primary" onclick="MostrarQR(this);">
							<span class="">
								<i class="glyphicon glyphicon-qrcode" aria-hidden="true"></i>
							</span>	
						</button>
						<a href="{{ url('QR_Dowmload/'.$producto->id) }}" class="btn btn-primary" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a>
					</td>
					
					<!-- imprimir reporte pdf -->
					<td class="text-center">
						<a href="{{ url('pdf/'.$producto->id) }}" class="btn btn-danger" target="_blank">
						<span class=""><i class="fa fa-file-pdf-o"></i></span> PDF
						</a>
					</td>
					
					<!-- informacion completa del bien -->
					<td class="text-center">
						<a href="{{ url('/productos/'.$producto->id) }}" class="btn btn-info">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
					</td>
					
					<!-- editar bienes por medio del modal -->
					<td class="text-center">
						<button type="button" id="btn_bienes" value="{{ $producto->id }}" 
						data-toggle="modal" data-target="#modal_edit_bienes" 
						aria-expanded="false" aria-controls="modal_edit_bienes" 
						class="btn btn-warning" onclick="MostrarBienes(this);">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
						</button>
					</td>

				</tr>
				@endforeach	
			</tbody>
		</table>
	</div>
	@include('partials.modal_edit_bienes')
	@include('partials.modal_edit_status')
	@include('partials.modal_QR')
	@endif
@endsection
@section('script')
	<script>
		//mostrar bienes o productos
		function MostrarBienes(btn_bienes){
		   	var ruta = "productos/"+btn_bienes.value+"/edit";
		  // $("#form_edit_bienes").serialize();
		  $.get(ruta, function(res){
		    $("#etiqueta").val(res.etiqueta);
		    $("#dep").val(res.departamento_id);
		    $("#ubi_exacta").val(res.ubicacion_exacta_id);
		    $("#cat").val(res.categoria_id);
		    $("#sub_cat").val(res.sub_categoria_id);
		    $("#tipo_subcat").val(res.tipo_subcat_id);
		    $("#marca").val(res.marca);
		    $("#modelo").val(res.modelo);
		    $("#serial").val(res.serial);
		    $("#descripcion").val(res.descripcion);
		    $("#id_bienes").val(res.id);
		  });
		}

		// ----- busqueda de ubicaciones exactas para edit
		// ----------------------------------------------
		// ---------------------------------------------
		$('#dep').change(function(event) {
		  $.get("ubi/"+event.target.value+"",function(response, dep){
		    $("#ubi_exacta").empty();
		    for (i = 0; i<response.length; i++) {
		        $("#ubi_exacta").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>"); 
		    }
		  });
		});

		// ----- busqueda de subcategorias para edicion de bienes--------------
		// ----------------------------------------------
		// ---------------------------------------------
		$('#cat').change(function(event) {
		  $.get("subcat/"+event.target.value+"",function(response, dep){
		    $("#sub_cat").empty();
		    $("#tipo_subcat").empty();
		    for (i = 0; i<response.length; i++) {
		        $("#sub_cat").append("<option value='"+response[i].id+"'> "+response[i].descripcion+"</option>"); 
		    }
		  });
		});

		// ----- busqueda de tipos_subcat para edicion por modal de bienes--------------
		// ----------------------------------------------
		// ---------------------------------------------
		$('#sub_cat').change(function(event) {
		  $.get("tipo_subcat/"+event.target.value+"",function(response, dep){
		    $("#tipo_subcat").empty();
		    for (i = 0; i<response.length; i++) {
		        $("#tipo_subcat").append("<option value='"+response[i].id+"'> "+response[i].descripcion+"</option>"); 
		    }
		  });
		});
	</script>
@endsection
