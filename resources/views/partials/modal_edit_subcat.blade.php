<div class="modal" tabindex="-1" role="dialog" id="modal_edit_subcat">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="panel panel-warning">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-left">
					<h3>Sub-Categoria</h3>
				</div>
			</div> 
			<div class="modal-body text-left">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<input type="hidden" id="id_subcat">
				<div class="form-group">	
					<label for="">Categoria</label>
					<select name="categoria_id" id="res_cat_id" required class="form-control">
						<option value="">Seleccione una categoria...</option>
						@foreach($categorias as $cat)
						<option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
						@endforeach
					</select>
				</div>	
				<div class="form-group">	
					<label for="">Codigo</label>
					<input type="text" name="codigo" class="form-control" placeholder="Codigo categoria.." id="res_codigo_subcat" required>
				</div>	
				<div class="form-group">
					<label for="">Descripcion</label>
					<input type="text" name="descripcion" class="form-control" placeholder="descripcion categoria...." id="res_descripcion_subcat" required>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-warning btn_edit_subcat">
						Actualizar
					</button>
				</div>
			</div>
		</div>	
	</div>
</div>