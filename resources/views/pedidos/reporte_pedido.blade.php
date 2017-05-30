@include('layouts.pdf')
<!--- inicio del header con logo -->
<div class="row">
	<div class="col-sm-8 col-xs-7">
		<img src="{{ asset('img/titlepdf.png') }}" alt="logo">
	</div>
	<div class="col-sm-5 col-xs-4">
		<h4 class="text-nowrap text-left"><br><blockquote>PEDIDO Nº {{ $pedidos->id }}</blockquote></b></h4>
	</div>
</div>
<!--- fin del header con logo -->

<br>

<!-- Apertura de contenedor div -->			
<div class="text-center" style="font-size: 12px;">

		<!--............. header de informacion cabecera 2-->
		<div class="row text-uppercase">
			<table class="table table-bordered text-center">
				<thead>
					<tr class="bg-danger text-danger">
						<td>REPORTE ELABORADO POR</td>
						<td>FECHA DEL REPORTE</td>
						<td>EMPRESA O DEPENDENCIA</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ Auth::user()->name }} {{ Auth::user()->ape }}</td>
						<td>{{ date('d') }} de {{ date('M') }} del {{ date('Y') }}</td>
						<td>VENEZOLANA DE RIEGO C.A.</td>
					</tr>
				</tbody>
			</table>
		</div> 
		
		<!--................ contenido ..............................-->
		<div class="row">
			<table class="table table-bordered text-center">
				<thead>
					<tr class="bg-success text-success">
						<td colspan="3">
							<h4>DETALLES DEL PEDIDO</h4>
						</td>
					</tr>
					<tr class="bg-success">
						<td>PEDIDO ELABORADO POR</td>
						<td>DEPARTAMENTO O UBICACION</td>
						<td>DESCRIPCION</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach($users as $user)
						<td>{{ $user->name }} {{ $user->ape }}</td>
						@endforeach
						<td>{{ $pedidos->nameUbicacion() }}</td>
						<td>{{ $pedidos->descripcion }}</td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td class="bg-success">FECHA DE PEDIDO: <b>{{ $pedidos->forCreated() }}</b></td>
					</tr>
				</tbody>
			</table>
		</div>
</div>


<!-- Footer con copyright -->
<footer class="margin-abajo">
	<div class="row pull-right">
		<span>
			Copyright &copy; {{ date("Y") }} Venezolana de Riego C.A. | All rights reserved.
		</span> 
	</div>
</footer>
<!-- Fin del Footer -->

</body>
</html>

