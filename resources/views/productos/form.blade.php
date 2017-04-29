{!! Form::open(['url' => $url, 'method' => $method]) !!} 
	<div class="form-group">
	{!! Form::text('etiqueta',$productos->etiqueta, ['class' => 'form-control', 'placeholder' => 'Etiqueta del Producto... ejemplo: Nª2001234567 -v', 'autofous']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('empresa',$productos->empresa, ['class' => 'form-control', 'placeholder' => 'Pertenece a la Empresa...']) !!}
	</div>
	@if(!$productos->id)
	<div class="form-group">
		<select name="estado_id" class="form-control" required>
			<option value="">Seleccione un estado...</option>
			@foreach($estado as $tado)
				<option value="{{ $tado->id }}">{{ $tado->name }}</option>
			@endforeach
		</select>
	</div>
	@endif
	@if(!$productos->id)	
	<div class="form-group">
		<select name="ubicacion_id" class="form-control">
			<option value="">Seleccione una Ubicacion...</option>
			@foreach($ubicacion as $ubi)
				<option value="{{ $ubi->id }}">{{ $ubi->name }}</option>
			@endforeach
		</select>
	</div>
	@endif
	<div class="form-group">
		{!! Form::textarea('descripcion',$productos->descripcion, ['class' => 'form-control', 'placeholder' => 'descripcion...']) !!}
	</div>
	@if(!$productos->id)
	<div class="form-group">
		<select name="tipo_id" class="form-control">
			<option value="">Seleccione un Tipo...</option>
			@foreach($tipo as $t)
				<option value="{{ $t->id }}">{{ $t->name }}</option>
			@endforeach
		</select>
	</div>
	@endif
	<div class="form-group">
		{!! Form::text('marca',$productos->marca, ['class' => 'form-control', 'placeholder' => 'Marca...']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('modelo',$productos->modelo, ['class' => 'form-control', 'placeholder' => 'Modelo...']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('serial',$productos->serial, ['class' => 'form-control', 'placeholder' => 'Serial...']) !!}
	</div>
	@if(!$productos->id)
	<div class="form-group">
		<select name="material_id" class="form-control">
			@foreach($material as $mate)
				<option value="{{ $mate->id }}">{{$mate->name}}</option>
			@endforeach
		</select>
	</div>
	@endif
	<div class="form-group">
		<select name="status" class="form-control" required value="{{ $productos->status }}">
		@if($productos->id)	
			@if(($productos->status) == 1) 
				<option value="1">Activo</option>
				<option value="0">Inactivo</option>	
			@elseif(($productos->status) == 0) 
				<option value="0">Inactivo</option>
				<option value="1">Activo</option>
			@endif
		@elseif(!$productos->id)
				<option value="">Selecione una opcion....</option>
				<option value="1">Activo</option>
				<option value="0">Inactivo</option>	
		@endif		
		</select>
	</div>
	<div class="form-group text-right">
		<a href="{{ url('/productos') }}" class="btn btn-link">Listado de Inventario</a>
		<input type="submit" value="Registro" class="btn btn-primary">
	</div>
{!! Form::close() !!}