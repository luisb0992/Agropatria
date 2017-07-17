@extends('layouts.app')

@section('content')
	@include('message.message')
	<div class="text-left">
		<a href="{{ url('/users/create') }}">
			<button class="btn btn-success btn-lg">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Nuevo
			</button>
		</a>
		<hr>
	</div>
	<div class="table table-responsive">
		<table class="table table-striped table-bordered">
			<caption class="gris-claro div-green"><h3><i class="glyphicon glyphicon-user"></i>Usuarios Del Sistema</h3></caption>
			<thead>
				<tr class="gris-claro">
					<th>Cedula</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Email</th>
					<th>Perfil</th>
					<th>Status</th>
					<th>Ver</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{ $user->cedula }}</td>

					<td>{{ $user->name }}</td>

					<td>{{ $user->ape }}</td>

					<td>{{ $user->email }}</td>

					<td>
						@if(($user->perfil_id) == 1)
							<span class="text-info">Administrador</span>
						@elseif(($user->perfil_id) == 2)
							<span class="text-success">Usuario</span>
						@endif
					</td>

					<td>
						@if(($user->status) == 1)
							<span class="text-primary">Activo</span>
						@else
							<span class="text-danger">Inactivo</span>
						@endif
					</td>

					<td>
						<a href="{{ url('/users/'.$user->id) }}" class="btn btn-info">
							<i class="fa fa-eye" aria-hidden="true"></i> VER
						</a>
					</td>

					<td>
						<a href="{{ url('/users/'.$user->id.'/edit') }}" class="btn btn-warning">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
						</a>
					</td>

				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection