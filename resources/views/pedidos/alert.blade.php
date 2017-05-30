<button type="submit" value="" class="btn btn-primary" data-toggle="modal" data-target="#solicitud">
		SOLICITUD
</button>

<!-- MODAL para solicitud-->
{!! Form::open(['url' => '/pedidos/'.$pedido->id, 'method' => 'PUT']) !!}
	<div class="modal fade" tabindex="-1" role="dialog" id="solicitud">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h4>LA SOLICITUD YA FUE PROCESADA?</h4>
				</div>
				<div class="modal-footer">
					<buttton class="btn btn-danger" data-dismiss="modal" type="button">NO</buttton>
					<input class="btn btn-success" type="submit" value="SI">
				</div>
			</div>
		</div>
	</div>
{!! Form::close() !!}