<div class="modal" tabindex="-1" role="dialog" id="modal_create_subcat">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="panel panel-info" id="panel">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-left">
					<h3>Sub-Categoria</h3>
				</div>
			</div> 
			<div class="modal-body text-left">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<div class="form-group">	
					<label for="">Categoria</label>
					<select name="categoria_id" id="cat_id" required class="form-control">
						<option value="">Seleccione una categoria...</option>
						@foreach($categorias as $cat)
						<option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
						@endforeach
					</select>
				</div>	
				<div class="form-group">	
					<label for="">Codigo</label>
					<input type="text" name="codigo" class="form-control" placeholder="Codigo categoria.." id="codigo_subcat" required>
				</div>	
				<div class="form-group">
					<label for="">Descripcion</label>
					<input type="text" name="descripcion" class="form-control" placeholder="descripcion categoria...." id="descripcion_subcat" required>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-info btn_create_subcat">
						Registro
					</button>
				</div>
			</div>
		</div>	
	</div>
</div>