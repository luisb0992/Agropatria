@extends('layouts.app')

@section('content')
	@include('message.message')
	@foreach ($users as $user)

	<h4 class="text-uppercase">
		@if($user->status == 1)
		<span class="text-primary">
			<i class="fa fa-user" aria-hidden="true"></i>
			{{ $user->name }} {{ $user->ape }}
		</span>
		@else
		<span class="text-danger">
			<i class="fa fa-user" aria-hidden="true"></i>
			{{ $user->name }} {{ $user->ape }}
		</span>
		@endif
	</h4>
	<div class="div-padding text-center" style="border: solid 1px #C9C9C9;">
		<div class="row well">
			<div class="col-sm-2 col-xs-12"><p class="text-uppercase"><b>Cedula</b></p> {{ $user->cedula }} </div>
			<div class="col-sm-3 col-xs-12"><p class="text-uppercase"><b>Fecha Nacimiento</b></p> {{ $user->formatofecha() }}</div>
			<div class="col-sm-4 col-xs-12"><p class="text-uppercase"><b>Correo</b></p> {{ $user->email }}</div>
			<div class="col-sm-3 col-xs-12"><p class="text-uppercase"><b>Direccion</b></p> {{ $user->direccion }}</div>
		</div>
		<div class="row well">
			<div class="col-sm-3 col-xs-12">
				<p class="text-uppercase">
				<b>Perfil</b></p>
				@if(($user->perfil_id) == 1)
					<span class="text-info">Administrador</span>
				@elseif(($user->perfil_id) == 2)
					<span class="text-success">Usuario</span>
				@endif
			</div>
			<div class="col-sm-3 col-xs-12">
				<p class="text-uppercase">
				<b>Status</b></p>
				@if(($user->status) == 1)
					<span class="text-primary">Activo</span>
				@else
					<span class="text-danger">Inactivo</span>
				@endif
			</div>
			<div class="col-sm-6 col-xs-12 text-center">
				<p class="text-uppercase"><b>Acciones</b></p>
				<div class="col-sm-4 col-xs-12">
					<a href="{{ url('/users/'.$user->id) }}" class="btn btn-info">
						<i class="fa fa-eye" aria-hidden="true"></i> VER
					</a>
					<br><br>
				</div>
				<div class="col-sm-4 col-xs-12">
					<a href="{{ url('/users/'.$user->id.'/edit') }}" class="btn btn-warning">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
					</a>
					<br><br>
				</div>
				<div class="col-sm-4 col-xs-12">@include('users.delete', ['users' => $users])</div>
			</div>
		</div>
	</div>
	<hr>
	@endforeach
	<div class="div-padding" align="right">
			<div class="pull-left">
				<span>{{ $users->links() }}</span>
			</div>
			<a href="{{ url('/users/create') }}">
				<button class="btn btn-success btn-lg">
						<i class="fa fa-plus" aria-hidden="true"></i>
						Nuevo
				</button>
			</a>
		</div>	
@endsection