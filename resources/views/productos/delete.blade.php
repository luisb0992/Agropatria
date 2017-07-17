<div class="btn-group">
	{!! Form::open(['url' => '/statusproductos/'.$producto->id, 'method' => 'PUT']) !!}
		<button type="button" value="" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			status <span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<button type="submit" name="status" value="1" class="btn btn-primary btn-block">Activo</button>
			<button type="submit" name="status" value="0" class="btn btn-danger btn-block">Inactivo</button>
		</ul>
	{!! Form::close() !!}
</div>
