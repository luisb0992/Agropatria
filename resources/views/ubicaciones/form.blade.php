{!! Form::open(['url' => $url, 'method' => $method]) !!}
		<div class="form-group">
			{!! Form::text('name',$ubicacion->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre de la ubicacion...', 'autofous']) !!}
		</div>	
		<div class="form-group text-right">
			<a href="{{ url('/ubicaciones') }}" class="btn btn-link">Listado de Ubicaciones</a>
			<input type="submit" value="Registro" class="btn btn-warning">
		</div>
{!! Form::close() !!}