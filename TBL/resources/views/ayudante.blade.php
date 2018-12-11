@extends('app')
@section('title', 'Ayudante')
@section('content')
	<br>
	<h1>Bienvenido ayudante: {{Session::get('user')}}</h1>
	<br>
	<h5>Opciones disponibles</h5>
	<center><br>
		<button class="btn" style="margin-left: 20px; background: #5396ff" ></button>
	</center>


@endsection