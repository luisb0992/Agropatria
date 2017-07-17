<div class="modal" tabindex="-1" role="dialog" id="modal_create_tipo_subcat">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="panel panel-success">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-center">
					<h3>Nuevo Tipo de Sub-categoria</h3>
				</div>
			 
				<div class="modal-body text-left">
					{!! Form::open(['url' => 'tipos_subcat/', 'method' => 'POST','class' => '', 'id' => 'form_create_tipo_subcat']) !!}
						<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
						<div class="form-group">
							<select name="sub_categoria_id" class="form-control" required>
								<option value="">Selleccione una Sub-categoria</option>
								@foreach($subcategorias as $subcat)
								<option value="{{ $subcat->id }}">{{ $subcat->descripcion }}</option>
								@endforeach
							</select>
						</div> 
						<div class="form-group">
							<label for="">Codigo</label>
							{!! Form::text('codigo',null, ['class' => 'form-control', 'placeholder' => 'codigo...']) !!}
						</div>
						<div class="form-group">
							<label for="">Descripcion</label>
							{!! Form::text('descripcion',null, ['class' => 'form-control', 'placeholder' => 'descripcion...']) !!}
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-success btn_create_tipo_subcat">
						Registro
					</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>	
	</div>
</div>