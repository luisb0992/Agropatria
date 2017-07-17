@extends('layouts.app')
@section('content')	
<div class="div-padding">
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>ID: <span class="text-info">{{ $users->id }}</span></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6 sale-span"><p class="text-uppercase">Cedula</p> {{ $users->cedula }}</div>
				<div class="col-sm-6 sale-span"><p>Nompre</p> {{ $users->name }}</div>
				<div class="col-sm-6 sale-span"><p>Apellido</p> {{ $users->ape }}</div>
				<div class="col-sm-6 sale-span"><p>Correo</p> {{ $users->email }}</div>
				<div class="col-sm-6 sale-span"><p>Direccion</p> {{ $users->direccion }}</div>
				<div class="col-sm-6 sale-span">
					@if(($users->status) == 1)
						<p>Status</p><span class="label label-primary">Activo</span>
					@else
						<p>Status</p><span class="label label-danger">Inactivo</span>
					@endif
				</div>
				@if(($users->perfil_id) == 1)
					 <div class="col-sm-6 sale-span">
					 	<p>Perfil</p><span class="label label-info">Administrador</span>
					 </div>
				@elseif(($users->perfil_id) == 2)
					 <div class="col-sm-6 sale-span">
					 	<p>Perfil</p><span class="label label-warning">Usuario</span>
					 </div>
				@endif
				
				<div class="col-sm-6 sale-span"><p>Creado el:</p> {{ $users->formatocreated() }}</div>
				<div class="col-sm-6 sale-span"><p>Ultima Actualizacion:</p> {{ $users->formatoupdated() }}</div>
			</div>
		</div>
	</div>	
	<div class="col-sm-12 text-right"><a href="{{ url('/users') }}" class="ptn ptn-link">Listado de Usuarios</a></div>											
</div>
@endsection