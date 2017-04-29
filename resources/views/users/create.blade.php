@extends("layouts.app")

@section("content")
	<div class="div-padding">
		@include('message.message')
		<h1 class="div-green">Nuevo Usuario</h1>
		@include('users.form', ['users' => $users, 'url' => '/users', 'method'=> 'POST'])
	</div>
@endsection 