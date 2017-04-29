@include('layouts.pdf')

<!--- inicio del header con logo -->
<div class="row">
	<div class="col-sm-8 col-xs-7">
		<img src="{{ asset('img/titlepdf.png') }}" alt="logo">
	</div>
	<div class="col-sm-5 col-xs-4">
		<h4 class="text-nowrap text-right"><br>
			<blockquote class="blockquote-reverse">INVENTARIO DE BIENES</blockquote>
		</h4>
	</div>
</div>
<!--- fin del header con logo -->
<br>

<!-- Cuerpo del pdf con los productos -->
		<div class="panel panel-success">
			<div class="row text-uppercase div-padding">
				<div class="col-xs-4 text-left">
					Listado de Productos  
				</div>
				<div class="col-xs-2"></div>
				<div class="col-xs-5 text-right">
					<span class="text-right">ELABORADO POR: {{ Auth::user()->name }} {{ Auth::user()->ape }}</span>
				</div>
				<div class="col-xs-1"></div>
			</div>
					<table class="table table-bordered text-center text-uppercase" style="font-size: 10px">
						<thead>
							<tr class="list-group-item-success">
								<td>ITEM</td>
								<td>ETIQUETA</td>
								<td>EMPRESA PERTENECIENTE</td>
								<td>DESCRIPCION</td>
								<td>UBICACION</td>
								<td>ESTADO</td>
								<td>TIPO</td>
								<td>MATERIAL</td>
								<td>MARCA</td>
								<td>MODELO</td>
								<td>SERIAL</td>
								<td>STATUS</td>
							</tr>
						</thead>
						@foreach($inventario as $productos)
							<tr>
								<td>{{ $productos->id }}</td>
								<td>{{ $productos->etiqueta }}</td>
								<td>{{ $productos->empresa }}</td>
								<td>{{ $productos->descripcion }}</td>
								<td>{{ $productos->nameUbicacion() }}</td>
								<td>{{ $productos->nameEstado() }}</td>
								<td>{{ $productos->nameTipo() }}</td>
								<td>{{ $productos->nameMaterial() }}</td>
								<td>{{ $productos->nameMarca() }}</td>
								<td>{{ $productos->nameModelo() }}</td>
								<td>{{ $productos->nameSerial() }}</td>
								@if($productos->statusProducto() == 'Activo')
								<td class="text-info">{{ $productos->statusProducto() }}</td>
								@else
								<td class="text-danger">{{ $productos->statusProducto() }}</td>
								@endif
							@endforeach
					</table>
		</div>
<!-- fin del cuerpo -->

		<!-- Footer con copyright y code Qr -->
		<footer class="margin-abajo">
			<div class="row">
				<div class="col-xs-3 text-left">
					<span>{{ date('d') }} de {{ date('M') }} del {{ date('Y') }}</span>
				</div>
				<div class="col-xs-9 pull-right text-right">
					<span>
						Copyright &copy; {{ date("Y") }} Venezolana de Riego C.A. | All rights reserved.
					</span> 
				</div>
			</div>
		</footer>
		<!-- Fin del Footer -->


	</body>
</html>