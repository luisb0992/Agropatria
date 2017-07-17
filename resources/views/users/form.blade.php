{!! Form::open(['url' => $url, 'method' => $method])!!}
			<div class="form-group">
				<label for="">Cedula</label>
				{!! Form::text('cedula',$users->cedula, ['class' => 'form-control', 'placeholder' => 'Cedula...ejemplo: 12345678']) !!}
			</div>
			<div class="form-group">
				<label for="">Nombre</label>
				{!! Form::text('name',$users->name, ['class' => 'form-control', 'placeholder' => 'Nombre...']) !!}
			</div>
			<div class="form-group">
				<label for="">Apellido</label>
				{!! Form::text('ape',$users->ape, ['class' => 'form-control', 'placeholder' => 'Apellido...']) !!}
			</div>
			<div class="form-group">
				<label for="">E-mail</label>
				{!! Form::email('email',$users->email, ['class' => 'form-control', 'placeholder' => 'Correo electronico...']) !!}
			</div>
			<div class="form-group">
				<label for="">Direccion</label>
				{!! Form::textarea('direccion',$users->direccion, ['class' => 'form-control', 'placeholder' => 'Direccion...']) !!}
			</div>
			<div class="form-group">
				<label for="">Perfil</label>
				<select name="perfil_id" class="form-control">
					@if($users->perfil_id)
					<option value="{{ $users->perfil_id }}">{{ $users->namePerfil() }}</option>
					@endif
                    <option value="">Perfil del usuario...</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                </select>
			<br>
			<div class="form-group">
				<label for="">Status</label>
				<select name="status" class="form-control">
					@if($users->status)
					<option value="{{ $users->status }}">{{ $users->nameStatus() }}</option>
					@endif
                    <option value="">Status...</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>    
			</div>
			@if(!$users->id)
			<div class="form-group">
				<label for="">Clave</label>
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Clave...']) !!}
			</div>
			@else
				<div class="form-group">&nbsp;</div>
			@endif			
			<div class="form-group text-right">
				<a href="{{ url('/users') }}" class="btn btn-link">Listado de Usuarios</a>
				<input type="submit" value="Registro" class="btn btn-success">
			</div>
{!! Form::close() !!}

