@extends('layouts.app')

@section('content')
	@include('message.message')
	<div class="panel panel-warning bg-warning">
		<div class="panel panel-heading">
				<a class="text-warning" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"  href="#">
				  <h4>Base de Materiales <i class="fa fa-level-down" aria-hidden="true"></i></h4>
				</a>
		</div>
			<div class="collapse" id="collapseExample">
			    <div class="panel-body div-padding">
					@foreach($materialbase as $material)
						<div class="col-sm-3"><span class="sale-span">{{$material->name}}</span></div>
					@endforeach
				</div>	
			</div>
	</div>
	
	<div class="panel panel-warning">			
		<div class="panel panel-heading bg-warning"><h4>Conjunto de Materiales</h4></div>			
		<div class="panel-body table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr class="text-nowrap bg-warning text-center">
						<td>Conjunto de materiales</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
						@foreach($conjunto as $con)
						<tr class="text-center text-nowrap">
							<td>{{$con->name}}</td>
							<td>@include('/materiales/delete', ['conjunto' => $conjunto])</td>
						</tr>	
						@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="div-padding" align="right">
			<div class="pull-left">
				<span>{{ $conjunto->links() }}</span>
			</div>
			<a href="{{ url('/materiales/create') }}">
				<button class="btn btn-warning btn-lg">
						<i class="fa fa-plus" aria-hidden="true"></i>
						Nuevo
				</button>
			</a>
	</div>	
@endsection

						