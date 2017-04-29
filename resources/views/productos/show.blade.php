@extends('layouts.app')
@section('content')	
<div class="div-padding">
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Item: <span class="text-info">{{ $productos->id }}</span></h3>
		</div>
		<div class="panel panel-body text-uppercase">
			<div class="row">
				<div class="col-sm-6 sale-span"><b>Etiqueta</b> <br>{{ $productos->etiqueta }}</div>
				<div class="col-sm-6 sale-span"><b>Empresa</b> <br>{{ $productos->empresa }}</div>
				<div class="col-sm-6 sale-span"><b>Estado</b> <br>{{ $productos->nameEstado() }}</div>
				<div class="col-sm-6 sale-span"><b>Ubicacion</b> <br>{{ $productos->nameUbicacion() }}</div>
				<div class="col-sm-6 sale-span"><b>Tipo</b> <br>{{ $productos->nameTipo() }}</div>
				<div class="col-sm-6 sale-span"><b>Marca</b> <br>@if($productos->marca == '')Sin Marca @else {{$productos->marca}} @endif</div>
				<div class="col-sm-6 sale-span"><b>Modelo</b> <br>@if($productos->modelo == '')Sin Modelo @else {{$productos->modelo}} @endif</div>
				<div class="col-sm-6 sale-span"><b>Serial</b> <br>@if($productos->serial == '')Sin Serial @else {{$productos->serial}} @endif</div>
				<div class="col-sm-6 sale-span"><b>Material</b> <br>{{ $productos->nameMaterial() }}</div>
				<div class="col-sm-6 sale-span"><b>Descripcion</b> <br>{{ $productos->descripcion }}</div>
				<div class="col-sm-6 sale-span">
					@if(($productos->status) == 1)
						<b>Status</b> <br><span class="label label-primary">Activo</span>
					@else
						<b>Status</b> <br><span class="label label-danger">Inactivo</span>
					@endif
				</div>
				<div class="col-sm-6 sale-span"><b>Creado el:</b><br> {{ $productos->formatocreated() }}</div>
				<div class="col-sm-6 sale-span"><b>Ultima Actualizacion:</b><br> {{ $productos->formatoupdated() }}</div>
				<div class="col-sm-6 sale-span">
					<a href="{{ url('pdf/'.$productos->id) }}" class="btn btn-danger" target="_blank">
					<i class="fa fa-file-pdf-o"></i>
					PDF
					</a>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-sm-12 text-right"><a href="{{ url('/productos') }}" class="btn btn-link">Listado de Productos</a></div>											
</div>
@endsection