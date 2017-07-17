<div class="modal" tabindex="-1" role="dialog" id="modal_create">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="panel panel-primary">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-left">
					<h3>Indique el Nombre del Departamento</h3>
				</div>
			</div> 
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<label for="">Nombre del Departamento</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Nombre...." required>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-primary" id="btn-create">
						Registro
					</button>
				</div>
			</div>
		</div>	
	</div>
</div>