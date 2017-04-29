@extends('layouts.app')

@section('content')
	@include('message.message')

	@foreach($productos as $producto)
		<div class="div-padding text-center text-uppercase table table-bordered" style="border: solid 1px #269640;">
			<div class="row">
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">ITEM</p>{{$producto->id}}<br><br></div>
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">ETIQUETA</p>{{$producto->etiqueta}}<br><br></div>
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">EMPRESA</p>{{$producto->empresa}}<br><br></div>
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">UBICACION</p>{{$producto->nameUbicacion()}}</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">DESCRIPCION</p>{{$producto->descripcion}}<br><br></div>
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">ESTADO</p>{{$producto->nameEstado()}}<br><br></div>
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">TIPO</p>{{$producto->nameTipo()}}<br><br></div>
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">MATERIAL</p>{{$producto->nameMaterial()}}</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">MARCA</p>{{$producto->nameMarca()}}<br><br></div>
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">MODELO</p>{{$producto->nameModelo()}}<br><br></div>
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">SERIAL</p>{{$producto->nameSerial()}}<br><br></div>
				<div class="col-sm-3"><p class="h1_padding list-group-item-success">ACCIONES</p>
					<div class="col-sm-12">
						<div class="col-sm-4 col-xs-4">
							<a href="{{ url('/productos/'.$producto->id) }}" class="btn btn-info">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
						</div>
						<div class="col-sm-4 col-xs-4">
							<a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="btn btn-warning">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</a>
						</div>
						<div class="col-sm-4 col-xs-4">
							@include('/productos/delete', ['produtos' => $productos])
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
	@endforeach	
	<div class="div-padding" align="right">
			<div class="pull-left">
				<span>{{ $productos->links() }}</span>
			</div>
			<a href="{{ url('/productos/create') }}">
				<button class="btn btn-primary btn-lg">
						<i class="fa fa-plus" aria-hidden="true"></i>
						Nuevo
				</button>
			</a>
		</div>		
@endsection
