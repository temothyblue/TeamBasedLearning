@if(Session::get('level')==1)
	<script type="text/javascript">
		window.location="/";
	</script>
@else
	@extends('app')
	@section('title', 'Ayudante')
	@section('content')
		<br>
		<h1>Bienvenido ayudante: {{Session::get('user')}}</h1>
		<br>
		<h5>Opciones disponibles</h5>
		<center><br>
			<button class="btn" style="margin-left: 20px; background: #5396ff; margin-bottom: 10px" onclick="window.location='/ayudante/crear_tema'">Crear temas</button>
			<button class="btn" style="margin-left: 20px; background: #5396ff; margin-bottom: 10px" onclick="window.location='/ayudante/agregat alumnos'">Agregar alumnos</button>
			<button class="btn" style="margin-left: 20px; background: #5396ff; margin-bottom: 10px" onclick="window.location='/ayudante/agregar_cursos'">Agregar cursos</button>
			<button class="btn" style="margin-left: 20px; background: #5396ff; margin-bottom: 10px" onclick="window.location='/ayudante/ver_tablas'">Ver Tablas</button>
			<button class="btn" style="margin-left: 20px; background: #5396ff; margin-bottom: 10px" onclick="window.location='/ayudante/añadir_curso_alumno'">Añadir curso a alumno</button>
			<button class="btn" style="margin-left: 20px; background: #5396ff; margin-bottom: 10px" onclick="window.location='/ayudante/retroalimentacion'">Envio de retroalimentacion</button>
		</center>
	@endsection
@endif