@extends('layouts.app')

@section('content')
	@include('message.message')
	<div class="panel panel-warning">
		<div class="panel-heading">
				<a class="text-warning" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"  href="#">
				  <h4>Tipos Definidos <i class="fa fa-level-down" aria-hidden="true"></i></h4>
				</a>
		</div>
			<div class="collapse" id="collapseExample">
			    <div class="panel-body text-center">
					@foreach($tipos as $tipo)
						<div class="col-sm-4 col-xs-12">
							<p class="">
								{{$tipo->name}}
							</p>
						</div>
					@endforeach
				</div>	
			</div>
	</div>
	
	<div class="panel panel-warning">			
		<div class="panel panel-heading bg-warning"><h4>Nuevos Tipos</h4></div>			
		<div class="panel-body table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr class="text-nowrap bg-warning text-center">
						<td>Tipos</td>
						<td>Accion</td>
					</tr>
				</thead>
				<tbody>
						@foreach($nuevostipos as $newtipo)
						<tr class="text-center text-nowrap">
							<td>{{$newtipo->name}}</td>
							<td>@include('/tipos/delete', ['nuevostipos' => $nuevostipos])</td>
						</tr>	
						@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="div-padding" align="right">
			<div class="pull-left">
				<span>{{ $nuevostipos->links() }}</span>
			</div>
			<a href="{{ url('/tipos/create') }}">
				<button class="btn btn-warning btn-lg">
						<i class="fa fa-plus" aria-hidden="true"></i>
						Nuevo
				</button>
			</a>
	</div>	
@endsection