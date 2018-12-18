@if(Session::get('level')==1)
	<script type="text/javascript">
		window.location="/";
	</script>
@else
	@extends('app')
	@section('title', 'Ayudante')
	@section('content')
		<br>
		<h3>Crear tema</h3><br>
		<h7>Nombre:</h7><br>
		<input type="text" class="text text_box" name="">
		<br><br><h7>Cantidad de integrantes:</h7><br>
		<input type="text" class="text text_box" name="" value="5">
		<br><br><h7>Estado del tema</h7><br>
		<input type="text" class="text text_box" name="" value="Abierto">
		<br><br><h7>Codigo del curso</h7><br>
		<input type="text" class="text text_box" name="">
		<br><br><h7>Fecha y hora de cierre</h7><br>
		<input type="datetime-local" class="text" style="margin-left: 50px"name=""><br><br>
		<center>
			<input type="submit" name="" class="btn">
		</center>
	@endsection
@endif