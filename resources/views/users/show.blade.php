@extends('layouts.app')
@section('content')	
<div class="div-padding">
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>ID: <span class="text-info">{{ $users->id }}</span></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6 sale-span"><b>Cedula</b> <br>{{ $users->cedula }}</div>
				<div class="col-sm-6 sale-span"><b>Nombre</b> <br>{{ $users->name }}</div>
				<div class="col-sm-6 sale-span"><b>Apellido</b> <br>{{ $users->ape }}</div>
				<div class="col-sm-6 sale-span"><b>Correo</b> <br>{{ $users->email }}</div>
				<div class="col-sm-6 sale-span"><b>Direccion</b> <br>{{ $users->direccion }}</div>
				<div class="col-sm-6 sale-span"><b>fecha de Nacimiento</b> <br>{{ $users->formatofecha() }}</div>
				<div class="col-sm-6 sale-span"><b>Edad</b> <br>{{ $users->getAgeAttribute()}} Años</div>
				<div class="col-sm-6 sale-span"><b>Observacion</b> <br> Ninguna</div>
				<div class="col-sm-6 sale-span">
					@if(($users->status) == 1)
						<b>Status</b> <br><span class="label label-primary">Activo</span>
					@else
						<b>Status</b> <br><span class="label label-danger">Inactivo</span>
					@endif
				</div>
				@if(($users->perfil_id) == 1)
					 <div class="col-sm-6 sale-span">
					 	<b>Perfil</b> <br><span class="label label-info">Administrador</span>
					 </div>
				@elseif(($users->perfil_id) == 2)
					 <div class="col-sm-6 sale-span">
					 	<b>Perfil</b> <br><span class="label label-success">Administrador BD</span>
					 </div>
				@elseif(($users->perfil_id) == 3)
					 <div class="col-sm-6 sale-span">
					 	<b>Perfil</b> <br><span class="label label-warning">Usuario</span>
					 </div>
				@endif
				
				<div class="col-sm-6 sale-span"><b>Creado el:</b> {{ $users->formatocreated() }}</div>
				<div class="col-sm-6 sale-span"><b>Ultima Actualizacion:</b> {{ $users->formatoupdated() }}</div>
			</div>
		</div>
	</div>	
	<div class="col-sm-12 text-right"><a href="{{ url('/users') }}" class="btn btn-link">Listado de Usuarios</a></div>											
</div>
@endsection