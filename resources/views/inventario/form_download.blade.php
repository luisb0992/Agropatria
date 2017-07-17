{!! Form::open(['url' => $url, 'method' => $method, 'class' => 'form-inline', 'id' => 'form_download']) !!}
<div class="" style="color: #000;">
		<div class="form-group">
			<label for="">Desde</label>
			<input type="text" class="form-control" id="from_des" name="from" required>
		</div>
		<div class="form-group">
			<label for="">Hasta</label>
			<input type="text"  class="form-control" id="to_des" name="to" required>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-danger" id="btn_descargar">
				<i id="icon_descargar" class="fa fa-download"></i>
				Descargar
			</button>
		</div>
</div>		
{!! Form::close() !!}