{!! Form::open(['url' => $url, 'method' => $method])!!}
			<div class="form-group">
				{!! Form::text('cedula',$users->cedula, ['class' => 'form-control', 'placeholder' => 'Cedula...ejemplo: 12345678']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('name',$users->name, ['class' => 'form-control', 'placeholder' => 'Nombre...']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('ape',$users->ape, ['class' => 'form-control', 'placeholder' => 'Apellido...']) !!}
			</div>
			<div class="form-group">
				{!! Form::email('email',$users->email, ['class' => 'form-control', 'placeholder' => 'Correo electronico...']) !!}
			</div>
			<div class="form-group">
				{!! Form::textarea('direccion',$users->direccion, ['class' => 'form-control', 'placeholder' => 'Direccion...']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('fechanac',$users->fechanac, ['class' => 'form-control', 'placeholder' => 'Fecha de nacimiento...formato: dd/mm/aa', 'id' => 'datepicker']) !!}
			</div>
			<div class="form-group">
			@if(!$users->perfil_id)
				<select name="perfil_id" class="form-control">
                    <option value="">Perfil del usuario...</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                </select>
            @else
            <b>Actualmente Perfil:</b>
            @if(($users->perfil_id) == 1)<span class="label label-info">Admin</span>@endif
      		@if(($users->perfil_id) == 2)<span class="label label-warning">Usuario</span>@endif
				<select name="perfil_id" class="form-control" required>
                    <option value="">Perfil del usuario...</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                </select>    
			</div>
			@endif
			<br>
			<div class="form-group">
			@if(($users->status) == 1)
				<b>Actualmente:</b><span class="label label-primary">Activo</span>
			@endif
				<select name="status" class="form-control">
                    <option value="">Status...</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>    
			</div>
			@if(!$users->id)
			<div class="form-group">
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

