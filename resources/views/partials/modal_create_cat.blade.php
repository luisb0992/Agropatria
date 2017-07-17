<div class="modal" tabindex="-1" role="dialog" id="modal_create_cat">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="panel panel-primary">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-left">
					<h3>Categoria</h3>
				</div>
			</div> 
			<div class="modal-body text-left">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<div class="form-group">	
					<label for="">Codigo</label>
					<input type="text" name="codigo" class="form-control" placeholder="Codigo categoria.." id="codigo" required>
				</div>	
				<div class="form-group">
					<label for="">Descripcion</label>
					<input type="text" name="descripcion" class="form-control" placeholder="descripcion categoria...." id="descripcion" required>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-primary btn_create_cat">
						Registro
					</button>
				</div>
			</div>
		</div>	
	</div>
</div>