{!! Form::open(['url' => $url, 'method' => $method]) !!}
		<div class="form-group panel-title">
		@foreach($materiales as $material)
			<div class="checkbox col-sm-3">
				<label class="">
					<input type="checkbox" value="{{$material->name}}" name="name[]">
					{{$material->name}}
				</label>
			</div>
		@endforeach
		</div>	
		<div class="form-group">&nbsp;</div>
		<div class="form-group text-right div-padding">
			<a href="{{ url('/materiales') }}" class="btn btn-link">Listado de Materiales</a>
			<input type="submit" value="Registro" class="btn btn-warning">
		</div>
{!! Form::close() !!}