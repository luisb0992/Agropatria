<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_bienes">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="panel panel-warning">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<div class="panel-heading text-center">
					<h3>Realizar Cambios</h3>
				</div>
			 
			<div class="modal-body text-left">
				{!! Form::open(['url' => 'productos/'.$producto->id, 'method' => 'POST','class' => '', 'id' => 'form_edit_bienes']) !!}
					{{ method_field('PUT') }}
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" id="id_bienes" name="id_bienes"> 
					<div class="form-group">
					<label for="">Etiqueta</label>
					{!! Form::text('etiqueta',$producto->etiqueta, ['class' => 'form-control', 'placeholder' => 'Etiqueta del Producto... ', 'id' => 'etiqueta']) !!}
					</div>
					<div class="form-group">
						<label for="">Departamentos</label>
						<select required name="departamento_id" class="form-control" id="dep">
							<option value="">Seleccione un Departamento...</option>
							@foreach($departamentos as $dep)
								<option value="{{ $dep->id }}">{{ $dep->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Ubicacion Exacta</label>
						<select required name="ubicacion_exacta_id" id="ubi_exacta" class="form-control">
							@foreach($ubiexacta as $ubi)
								<option value="{{ $ubi->id }}">{{ $ubi->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Categorias</label>
						<select required name="categoria_id" class="form-control" id="cat">
							<option value="">Seleccione una categoria</option>
							@foreach($categorias as $cat)
							<option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Sub-categorias</label>
						<select required name="sub_categoria_id" id="sub_cat" class="form-control">
							@foreach($subcat as $sub)
								<option value="{{ $sub->id }}">{{ $sub->descripcion }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Tipos de Sub-categorias</label>
						<select required name="tipo_subcat_id" id="tipo_subcat" class="form-control">
							@foreach($tiposubcat as $tiposub)
								<option value="{{ $tiposub->id }}">{{ $tiposub->descripcion }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Marca</label>
						{!! Form::text('marca',$producto->marca, ['class' => 'form-control', 'placeholder' => 'Marca...','id' => 'marca']) !!}
					</div>
					<div class="form-group">
						<label for="">Modelo</label>
						{!! Form::text('modelo',$producto->modelo, ['class' => 'form-control', 'placeholder' => 'Modelo...','id' => 'modelo']) !!}
					</div>
					<div class="form-group">
						<label for="">Serial</label>
						{!! Form::text('serial',$producto->serial, ['class' => 'form-control', 'placeholder' => 'Serial...','id' => 'serial']) !!}
					</div>
					<div class="form-group">
						<label for="">Descripcion</label>
						{!! Form::textarea('descripcion',$producto->descripcion, ['class' => 'form-control', 'placeholder' => 'descripcion...','id' => 'descripcion']) !!}
					</div>
			</div>
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
					<button type="submit" class="btn btn-warning btn_edit_bienes">
						Actualizar
					</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>	
	</div>
</div>