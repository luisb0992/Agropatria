<div class="modal" tabindex="-1" role="dialog" id="modal_edit">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="panel panel-warning">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-left"><h3>Actualizar Registro</h3></div>
			</div> 
			<div class="modal-body text-left">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<input type="hidden" id="id">
				<div class="form-group">
					<label for="">Nombre del departamento</label>
					<input type="text" name="name" id="dep" class="form-control" required="">
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-warning" id="btn-actualizar">
						 Actualizar
					</button>
				</div>
				<!-- <div class="progress">
					<div class="progress-bar progress-bar-striped active" 
					role="progressbar" aria-volunow="50" aria-valuemin="0" aria-valuemax="100"
					></div>
				</div> -->
			</div>
		</div>	
	</div>
</div>