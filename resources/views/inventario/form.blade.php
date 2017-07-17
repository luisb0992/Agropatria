{!! Form::open(['url' => $url, 'method' => $method, 'class' => 'form-inline', 'id' => 'form_fecha']) !!}
<div class="" style="color: #000;">
		<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="">Desde</label>
			<input type="text" class="form-control" id="from" name="from" required>
		</div>
		<div class="form-group">
			<label for="">Hasta</label>
			<input type="text"  class="form-control" id="to" name="to" required>
		</div>	
		<div class="form-group">
			<button type="submit" class="btn btn-primary" id="btn_buscar">
				<i class="glyphicon glyphicon-search"></i> Buscar
			</button>
		</div>
</div>		
{!! Form::close() !!}