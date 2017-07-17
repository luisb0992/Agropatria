<div class="modal" tabindex="-1" role="dialog" id="modal_edit_tipo_subcat">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="panel panel-warning">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-center">
					<h3>Realizar Cambios</h3>
				</div>
				<div class="modal-body text-left">
					{!! Form::open(['url' => 'tipos_subcat/', 'method' => 'POST','class' => '', 'id' => 'form_edit_tipo_subcat']) !!}
						{{ method_field('PUT') }}
						<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
						<input type="hidden" id="id_ti">
						<div class="form-group">
							<select name="sub_categoria_id" id="sub_cat" class="form-control" required>
							@foreach($subcategorias as $subcat)
								<option value="{{ $subcat->id }}">{{ $subcat->descripcion }}</option>
							@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label for="">Codigo</label>
							{!! Form::text('codigo',null, ['class' => 'form-control', 'placeholder' => 'codigo...','id' => 'co']) !!}
						</div>
						<div class="form-group">
							<label for="">Descripcion</label>
							{!! Form::text('descripcion',null, ['class' => 'form-control', 'placeholder' => 'descripcion...', 'id' => 'de']) !!}
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-warning btn_edit_tipo_subcat">
						Actualizar
					</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>	
	</div>
</div>