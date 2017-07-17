@extends('layouts.app')
@section('content')
	<div class="table table-responsive">
		<div class="panel panel-primary">
			<div class="panel panel-heading text-center">
				<h4>Ultimos bienes Registrados</h4>
			</div>
			<table class="table table-bordered table-striped">
				<thead>
					<tr class="div-blue">
						<th>Etiqueta</th>
						<th>Departamento</th>
						<th>Ubicacion Exacta</th>
						<th>Tipo SubCategoria</th>
						<th>Status</th>
						<th>Registro</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bienes as $producto)
					<tr>
						<td>{{ $producto->etiqueta }}</td>

						<td>{{ $producto->nameDepartamento() }}</td>

						<td>{{ $producto->nameUbicacionExacta() }}</td>

						<td>{{ $producto->tipoSubCat->descripcion }}</td>

						<td>EN {{ $producto->nameStatusBienes() }}</span></td>

						<td>{{ $producto->formatocreated() }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection



