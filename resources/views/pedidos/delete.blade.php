<button type="submit" value="" class="btn btn-danger" data-toggle="modal" data-target="#mymodal">
		ELIMINAR
</button>
{!! Form::open(['url' => '/pedidos/'.$pedido->id, 'method' => 'DELETE']) !!}
	<div class="modal fade" tabindex="-1" role="dialog" id="mymodal">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h4>SEGURO DESEA ELIMINAR?</h4>
				</div>
				<div class="modal-footer">
					<buttton class="btn btn-danger" data-dismiss="modal" type="button">NO</buttton>
					<input class="btn btn-success" type="submit" value="ELIMINAR">
				</div>
			</div>
		</div>
	</div>
{!! Form::close() !!}