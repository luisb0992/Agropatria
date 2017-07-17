@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="info-box border-claro">
			  <span class="info-box-icon bg-green"><i class="fa fa-pie-chart"></i></span>
			  	<div class="info-box-content">
				    <span class="info-box-text">Estadisticas de bienes adquiridos</span>
				    <span class="info-box-number"></span>
					<div class="progress">
				      <div class="progress-bar"></div>
				  	</div>
				  	<a href="{{ url('estadisticas') }}" class="btn btn-link btn-lg"><span class="text-success"><i class="fa fa-bar-chart-o"></i> Ver</span></a>
				</div>
			</div>
		</div>
		<div class="col-sm-12 div-padding">	
			<div class="col-sm-6 div-separator-right">
				@include('inventario.form',['url' => '/busqueda', 'method' => 'POST'])
			</div>
			<div class="col-sm-6 text-right">
				@include('inventario.form_download',['url' => '/pdf_general_download', 'method' => 'POST'])
			</div>
		</div>
		<div class="col-sm-12">
			@include('message.message')
			@include('message.mensajes_ajax')
		</div>
		<div class="col-sm-12"><p></p></div>
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Bienes adquiridos</h4>
				</div>
				<div class="panel-body">
					<div class="col-xs-12 col-md-6">
						<div class="info-box">
						  <span class="info-box-icon bg-blue"><i class="fa fa-angle-left"></i></span>
						  <div class="info-box-content">
						    <span class="info-box-text">Mes Anterior</span>
						    <span class="info-box-number">{{ $totalmesanterior }}</span>
							<div class="progress">
						      <div class="progress-bar"></div>
						    </div>
							@if($totalmesanterior > 1)
							<a href="{{ url('pdf_mes_anterior') }}" class="btn-link" target="_blank">
								<span class="progress-description btn-hover-pdf">
									<i class="fa fa-file-pdf-o"></i>
									PDF
								</span>
							</a>
							@endif
						  </div>
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="info-box">
						  <span class="info-box-icon bg-blue"><i class="fa fa-dot-circle-o"></i></span>
						  <div class="info-box-content">
						    <span class="info-box-text">Mes Actual</span>
						    <span class="info-box-number">{{ $totalMonthCount }}</span>
							<div class="progress">
						      <div class="progress-bar"></div>
						    </div>
							@if($totalMonthCount > 1)
							<a href="{{ url('pdf_mes_actual') }}" class="btn-link" target="_blank">
								<span class="progress-description btn-hover-pdf">
									<i class="fa fa-file-pdf-o"></i>
									PDF
								</span>
							</a>
							@endif
						  </div>
						</div>
					</div>
				</div>	
				<div class="table table-responsive">		
					<table class="table table-striped">
						<caption><b>Ultimos Reportes</b></caption>
						<thead>
							<tr class="text-uppercase">
								<th>Etiqueta</th>
								<th>Departamento</th>
								<th>Ubicacion exacta</th>
								<th>Tipo de SubCategoria</th>
								<th>Responsable</th>
								<th>Fecha de registro</th>
								<th>Status</th>
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
								<td>{{ $bienes->nameStatusBienes() }}</td>
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
		</div>
	</div>
	@include('partials.modal_datos_bienes')
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

		/////picker numero 2 para descargar
		$(function() {
		  var dateFormat = "dd/mm/yy",
		    from = $( "#from_des" )
		      .datepicker({
		        defaultDate: "+1w",
		        changeMonth: true,
		        changeYear: true,
		        numberOfMonths: 1
		      })
		      .on( "change", function() {
		        to.datepicker( "option", "minDate", getDate( this ) );
		      }),
		    to = $( "#to_des" ).datepicker({
		      defaultDate: "+1w",
		      changeMonth: true,
		      changeYear: true,
		      numberOfMonths: 1
		    })
		    .on( "change", function() {
		      from.datepicker( "option", "maxDate", getDate( this ) );
		    });

		  function getDate( element ) {
		    var date;
		    try {
		      date = $.datepicker.parseDate( dateFormat, element.value );
		    } catch( error ) {
		      date = null;
		    }

		    return date;
		  }
		} );
		
		// $("#form_download").submit(function(event) {
		// 	$("#btn_descargar").removeClass('glyphicon glyphicon-download-alt');
		// 	$("#icon_descargar").addClass('fa fa-refresh fa-spin');
		// });
		
	</script>
@endsection
