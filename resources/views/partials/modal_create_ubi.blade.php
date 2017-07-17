<div class="modal" tabindex="-1" role="dialog" id="modal_create_ubi">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="panel panel-info">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-left">
					<h3>Indique el Nombre de la ubicacion</h3>
				</div>
			</div> 
			<div class="modal-body">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<div class="form-group text-left">
					<label for="" class="text-left">
						Seleccione Departamento<span class="bg-danger">*</span>
					</label>
					<select name="departamento_id" id="dep_id" required class="form-control text-uppercase">
						<option value="">Seleccione un departamento</option>
						@foreach($departamentos as $dep)
						<option value="{{ $dep->id }}">{{ $dep->name }}</option>
						@endforeach
					</select>
				</div>	
				<div class="form-group text-left">
					<label for="" class="text-left">
						Nombre de la ubicacion exacta<span class="bg-danger">*</span>
					</label>
					<input type="text" name="name" id="name_ubi" class="form-control" 
					placeholder="Nombre...." required>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger btn-cerrar" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-info btn-create-ubi">
						Registro
					</button>
				</div>
			</div>
		</div>	
	</div>
</div>