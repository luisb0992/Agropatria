{!! Form::open(['url' => $url, 'method' => $method]) !!}
		<div class="form-group">
			{!! Form::textarea('descripcion',$pedidos->descripcion, ['class' => 'form-control text-uppercase', 'placeholder' => 'Indique una descripcion...', 'autofous']) !!}
		</div>	
		<div class="form-group">
			<select name="ubicacion_id" class="form-control">
				@if($pedidos->ubicacion_id)
				<option value="{{ $pedidos->ubicacion_id }}">{{ $pedidos->nameUbicacion() }}</option>
				@endif
				<option value="">INDIQUE UN DEPARTAMENTO O UBICACION....</option>
				@foreach($ubicaciones as $ubicacion)
				<option value="{{ $ubicacion->id }}">{{ $ubicacion->name }}</option>
				@endforeach
			</select>
		</div>	
		<div class="form-group text-right">
			<a href="{{ url('/pedidos') }}" class="btn btn-link pull-left">
				Listado de Pedidos
			</a>
			<input type="submit" value="solicitar" class="btn btn-success">
		</div>
{!! Form::close() !!}
