@include('layouts.pdf')
<!--- inicio del header con logo -->
<div class="row">
	<div class="col-sm-8 col-xs-7">
		<img src="{{ asset('img/titlepdf.png') }}" alt="logo">
	</div>
	<div class="col-sm-5 col-xs-4">
		<h4 class="text-nowrap text-left"><br><blockquote>INVENTARIO DE BIENES</blockquote></b></h4>
	</div>
</div>
<!--- fin del header con logo -->
<br>
<!-- Apertura de contenedor div -->			
<div style="font-size: 12px;">
	<table class="table table-bordered">
		<thead>
			<tr class="gris-claro">
				<th colspan="3">
					<span class="text-uppercase">
						BIENES NACIONALES
					</span>
				</th>
			</tr>
			<tr class="gris-claro">
				<th>EMPRESA O DEPENDENCIA</th>
				<th>ELABORADO POR</th>
				<th>FECHA</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><span>VENEZOLANA DE RIEGO C.A.</span></td>
				<td><span>{{ Auth::user()->name }} {{ Auth::user()->ape }}</span></td>
				<td><span>{{ date('d') }} de {{ date('M') }} del {{ date('Y') }}</span></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-bordered">
		<thead>
			<tr class="gris-claro">
				<th>ETIQUETA</th>
				<th>DEPARTAMENTO</th>
				<th>UBICACION EXACTA</th>
				<th>TIPO SUBCATEGORIA</th>
				<th>RESPONSABLE</th>
				<th>STATUS</th>
				<th>REGISTRO</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bienes as $bien)
			<tr>
				<td>{{ $bien->etiqueta }}</td>
				<td>{{ $bien->nameDepartamento() }}</td>
				<td>{{ $bien->nameUbicacionExacta() }}</td>
				<td>{{ $bien->tipoSubCat->descripcion }}</td>
				<td>{{ $bien->responsable->name.' '.$bien->responsable->ape }}</td>
				<td>EN {{ $bien->nameStatusBienes() }}</td>
				<td>{{ $bien->formatocreated() }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Cierre de contenedor div well -->	



<!-- Footer con copyright y code Qr -->
<footer class="margin-abajo text-center" style="border-top: solid 2px #353535;">
	<span>
		Copyright &copy; {{ date("Y") }} Venezolana de Riego C.A. | All rights reserved.
	</span> 
</footer>
<!-- Fin del Footer -->

</body>
</html>

