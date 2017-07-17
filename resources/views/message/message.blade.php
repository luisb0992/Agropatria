	@if (Session::has('message'))
		<div class="alert alert-success" id="mensaje">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    {{ Session::get('message') }}
		</div>
	@elseif (Session::has('error'))
		<div class="alert alert-danger">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    {{ Session::get('error') }}
		</div>
	@elseif (Session::has('warning'))
		<div class="alert alert-warning">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    {{ Session::get('error') }}
		</div>	
	@elseif($errors->any())
		<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p>Verifique los siguientes campo:</p>
		<br>
		    <ul>
		    	@foreach($errors->all() as $error)
		    	<li>{{$error}}</li>
		    	@endforeach
		    </ul>
		</div>	
	@endif