{!! Form::open(['url' => $url, 'method' => $method]) !!}
<div class="row" style="color: #000;">
		<div class="form-group col-sm-3">
			<input type="text" class="form-control" id="from" name="from" required>
		</div>
		<div class="form-group col-sm-3">
			<input type="text"  class="form-control" id="to" name="to" required>
		</div>	
		<div class="form-group col-sm-6">
			<input type="submit" value="buscar" class="btn btn-primary">
		</div>
</div>		
{!! Form::close() !!}