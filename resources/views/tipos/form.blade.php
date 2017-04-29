{!! Form::open(['url' => $url, 'method' => $method]) !!}
		<div class="form-group">
			{!! Form::text('name',$tipos->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre del nuevo tipo...', 'autofous']) !!}
		</div>	
		<div class="form-group text-right">
			<a href="{{ url('/tipos') }}" class="btn btn-link">Listado de Ubicaciones</a>
			<input type="submit" value="Registro" class="btn btn-warning">
		</div>
{!! Form::close() !!}