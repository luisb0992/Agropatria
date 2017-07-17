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
<div class="">
	<table class="table table-bordered">
		<caption><strong>BIENES NACIONALES - Nº {{ $producto->id }}</strong></caption>
		<thead>
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
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $producto->etiqueta }}</td>
				<td>{{ $producto->nameDepartamento() }}</td>
				<td>{{ $producto->nameUbicacionExacta() }}</td>
			</tr>
			<tr class="gris-claro">
				<th>TIPO DE SUBCATEGORIA</th>
				<th>STATUS</th>
				<th>FECHA REGISTRO</th>
			</tr>
			<tr>
				<td>{{ $producto->tipoSubCat->descripcion }}</td>
				<td>EN {{ $producto->nameStatusBienes() }}</td>
				<td>{{ $producto->formatocreated() }}</td>
			</tr>
		</tbody>
	</table>
	<table class="table table-bordered">
		<thead>
			<tr class="gris-claro text-center">
				<th colspan="2" class="text-center">RESPONSABLE</th>
			</tr>
			<tr class="gris-claro">
				<th>CEDULA</th>
				<th>NOMBRE Y APELLIDO</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $producto->responsable->cedula }}</td>
				<td>{{ $producto->responsable->name.' '.$producto->responsable->ape }}</td>
			</tr>
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

