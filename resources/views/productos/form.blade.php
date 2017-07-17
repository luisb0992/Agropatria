{!! Form::open(['url' => $url, 'method' => $method,'class' => '']) !!} 
	<div class="form-group">
	<label for="">Etiqueta</label>
	{!! Form::text('etiqueta',$productos->etiqueta, ['class' => 'form-control', 'placeholder' => 'Etiqueta del Producto... ', 'autofous']) !!}
	</div>	
	<div class="form-group">
		<label for="">Departamentos</label>
		<select required name="departamento_id" class="form-control" id="dep">
			<option value="">Seleccione un Departamento...</option>
			@foreach($departamentos as $dep)
				<option value="{{ $dep->id }}">{{ $dep->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Ubicacion Exacta</label>
		<select required name="ubicacion_exacta_id" id="bus_ubicacion" class="form-control">
			<option value="">Seleccione una Ubicacion del departamento</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">Categorias</label>
		<select required name="categoria_id" class="form-control" id="cat">
			<option value="">Seleccione una categoria</option>
			@foreach($categorias as $cat)
			<option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Sub-categorias</label>
		<select required name="sub_categoria_id" id="sub_cat" class="form-control">
			<option value="">Seleccione la sub-categoria</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">Tipos de Sub-categorias</label>
		<select required name="tipo_subcat_id" id="tipo_subcat" class="form-control">
			<option value="">Seleccione el tipo de sub-categoria</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">Marca</label>
		{!! Form::text('marca',$productos->marca, ['class' => 'form-control', 'placeholder' => 'Marca...']) !!}
	</div>
	<div class="form-group">
		<label for="">Modelo</label>
		{!! Form::text('modelo',$productos->modelo, ['class' => 'form-control', 'placeholder' => 'Modelo...']) !!}
	</div>
	<div class="form-group">
		<label for="">Serial</label>
		{!! Form::text('serial',$productos->serial, ['class' => 'form-control', 'placeholder' => 'Serial...']) !!}
	</div>
	<div class="form-group">
		<label for="">Descripcion</label>
		{!! Form::textarea('descripcion',$productos->descripcion, ['class' => 'form-control', 'placeholder' => 'descripcion...']) !!}
	</div>
	<div class="form-group">
		<label for="">Status</label>
		<select name="status_bienes_id" class="form-control" required>
			<option value="">Seleccione un Status</option>
			@foreach($status as $sta)
			<option value="{{ $sta->id }}">{{ $sta->name }}</option>
			@endforeach
		</select>
	</div>
	<br>
	<div class="form-group">
		<div class="div-green"><h3>Responsable</h3></div>
	</div>
	<div class="form-group">
		<label for="">Cedula</label>
		{!! Form::text('cedula',$productos->cedula, ['class' => 'form-control', 'placeholder' => 'cedula del responsable...']) !!}
	</div>
	<div class="form-group">
		<label for="">Nombre</label>
		{!! Form::text('name',$productos->name, ['class' => 'form-control', 'placeholder' => 'Nombre del responsable...']) !!}
	</div>
	<div class="form-group">
		<label for="">Apellido</label>
		{!! Form::text('ape',$productos->ape, ['class' => 'form-control', 'placeholder' => 'Apellido del responsable...']) !!}
	</div>
	<div class="form-group">
		<a href="{{ url('/productos') }}" class="btn btn-link text-left">Listado de Inventario</a>
		<input type="submit" value="Registro" class="btn btn-primary pull-right">
	</div>
{!! Form::close() !!}