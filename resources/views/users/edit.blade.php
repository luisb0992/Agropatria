@extends("layouts.app")

@section("content")
	<div class="div-padding">
		@include('message.message')
		<h1 class="div-green">Realizar cambios</h1>
		@include('users.form', ['users' => $users, 'url' => '/users/'.$users->id, 'method' => 'PUT'])
	</div>
@endsection 