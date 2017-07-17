<div class="modal" tabindex="-1" role="dialog" id="modal_edit_status">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="panel panel-warning">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-center">
					<h3>Cambio de Status</h3>
				</div>
			 
				<div class="modal-body text-left">
					{!! Form::open(['url' => 'prod_status/'.$producto->id, 'method' => 'POST','class' => '', 'id' => 'form_edit_status']) !!}
						<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
						<input type="hidden" id="id_bienes_status" name="id_bienes"> 
						<div class="form-group">
							<label for="">Status</label>
							<select name="status_bienes_id" class="form-control" required id="status_bienes_edit">
								<option value="">Seleccione un Status</option>
								@foreach($status as $sta)
								<option value="{{ $sta->id }}">{{ $sta->name }}</option>
								@endforeach
							</select>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-warning btn_edit_status">
						Actualizar
					</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>	
	</div>
</div>