@extends('app')
@section('title','Login')
@section('content')
	<div class="form-group">
		<center>
		<br>
		<h1>Login</h1>
		<br>
		<form action="/loginme" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<label for="">User</label>
			<input type="text" class="form-control" name="username" style="width: 40%">
			<label for="">Password</label>
			<input type="password" class="form-control" name="password" style="width: 40%"><br>
			<button type="submit" class="btn btn-primary" name="login">Enviar</button>
		</form>
	</center>
	</div>
@endsection