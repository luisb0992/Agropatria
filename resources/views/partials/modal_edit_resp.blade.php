<div class="modal" tabindex="-1" role="dialog" id="modal_edit_resp">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="panel panel-warning">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-center">
					<h3>Realizar Cambios</h3>
				</div>
			 
			<div class="modal-body text-left">
				{!! Form::open(['url' => 'responsable/'.$productos->responsable->id, 'method' => 'POST','class' => '', 'id' => 'form_edit_resp']) !!}
					{{ method_field('PUT') }}
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" id="id_resp" name="id_resp">
					<div class="form-group">
						<div class="div-green"><h5>Responsable</h5></div>
					</div>
					<div class="form-group">
						<label for="">Cedula</label>
						{!! Form::text('cedula',$productos->responsable->cedula, ['class' => 'form-control', 'placeholder' => 'cedula del responsable...','id' => 'cedula']) !!}
					</div>
					<div class="form-group">
						<label for="">Nombre</label>
						{!! Form::text('name',$productos->responsable->name, ['class' => 'form-control', 'placeholder' => 'Nombre del responsable...', 'id' => 'name']) !!}
					</div>
					<div class="form-group">
						<label for="">Apellido</label>
						{!! Form::text('ape',$productos->responsable->ape, ['class' => 'form-control', 'placeholder' => 'Apellido del responsable...', 'id' => 'ape']) !!}
					</div>
			</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-warning btn_edit_resp">
						Actualizar
					</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>	
	</div>
</div>