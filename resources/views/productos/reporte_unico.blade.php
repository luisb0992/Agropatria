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
<div class="text-center" style="font-size: 12px;">
		<div class="row text-uppercase">
			<div class="col-xs-3">
				<p class="list-group-item-danger"><b>FECHA</b></p> <span>{{ date('d') }} de {{ date('M') }} del {{ date('Y') }}</span>
			</div>
			<div class="col-xs-3">
				<p class="list-group-item-danger"><b>ELABORADO POR</b></p> <span>{{ Auth::user()->name }} {{ Auth::user()->ape }}</span>
			</div>
			<div class="col-xs-4">
				<p class="list-group-item-danger"><b>EMPRESA O DEPENDENCIA</b></p> <span>VENEZOLANA DE RIEGO C.A.</span>
			</div>
			<div class="col-xs-2">&nbsp;</div>
		</div>
		<hr>		
		<div class="row text-uppercase">
				<div class="col-xs-3"><p class="list-group-item-success">Item</p>
					<span  class="sale-span">{{ $productos->id }}</span>
				</div> 
				<div class="col-xs-3"><p class="list-group-item-success">Etiqueta</p>
					<span  class="sale-span">{{ $productos->etiqueta }}</span>
				</div> 
				<div class="col-xs-4"><p class="list-group-item-success">Empresa</p>
					<span class="sale-span">{{ $productos->empresa }}</span>
				</div>
				<div class="col-xs-2">&nbsp;</div>
		</div>
		<hr>
		<div class="row text-uppercase">
				<div class="col-xs-3"><p class="list-group-item-success">Estado</p>
					<span class="sale-span">{{ $productos->nameEstado() }}</span>
				</div>
				<div class="col-xs-3"><p class="list-group-item-success">Ubicacion</p>
					<span class="sale-span">{{ $productos->nameUbicacion() }}</span>
				</div>		
				<div class="col-xs-4"><p class="list-group-item-success">Descripcion</p>
					<span class="sale-span">
						{{ $productos->descripcion }}
					</span>
				</div>
				<div class="col-xs-2">&nbsp;</div>
		</div>
		<hr>
		<div class="row text-uppercase">
				<div class="col-xs-3"><p class="list-group-item-success">Serial</p>
					<span class="sale-span">{{$productos->nameSerial()}}</span>
				</div>
				<div class="col-xs-3"><p class="list-group-item-success">Marca</p>
					<span class="sale-span">{{$productos->nameMarca()}}</span>
				</div>
				<div class="col-xs-4"><p class="list-group-item-success">Modelo</p>
					<span class="sale-span">{{$productos->nameModelo()}}</span>
				</div>
				<div class="col-xs-2">&nbsp;</div>		
		</div>
		<hr>
		<div class="row text-uppercase">
				<div class="col-xs-3"><p class="list-group-item-success">Tipo</p>
					<span class="sale-span">{{ $productos->nameTipo() }}</span>
				</div>
				<div class="col-xs-3"><p class="list-group-item-success">Material</p>
					<span class="sale-span">{{ $productos->nameMaterial() }}</span>
				</div>
				<div class="col-xs-4"><p class="list-group-item-success">Status</p>
					<span class="sale-span text-info">
					{{$productos->statusProducto()}}
					</span>
				</div>
				<div class="col-xs-2"></div>
		</div>		
</div>

<!-- Cierre de contenedor div well -->	



<!-- Footer con copyright y code Qr -->
<footer class="margin-abajo">
	<div class="row">
		<div class="col-xs-4">
			<img src="data:image/png;base64,{{ $base64qr }}">
		</div>	
		<div class="col-xs-7">
		<br><br><br><br><br><br><br>
			<span>
				Copyright &copy; {{ date("Y") }} Venezolana de Riego C.A. | All rights reserved.
			</span> 
		</div>
		<div class="col-sm-1">&nbsp;</div>
	</div>
</footer>
<!-- Fin del Footer -->

</body>
</html>

