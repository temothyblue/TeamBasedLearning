	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="/">TeamBasedLearning</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="/">Inicio</a>
				</li>
				@if(Session::get('level')==0 and Session::get('user'))
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Opciones
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="/ayudante/crear_tema">Crear Tema</a>
							<a class="dropdown-item" href="/ayudante/agregat alumnos">Agregar Alumnos</a>
							<a class="dropdown-item" href="/ayudante/agregar_cursos">Agregar Cursos</a>
							<a class="dropdown-item" href="/ayudante/ver_tablas">Ver Tablas</a>
							<a class="dropdown-item" href="/ayudante/añadir_curso_alumno">Añadir curso Alumnos</a>
							<a class="dropdown-item" href="/ayudante/retroalimentacion">Envio Retroalimentacion</a>
						</div>
					</li>
				@endif
				@if(Session::get('user'))
				<li class="nav-item">
					<a class="nav-link btn" href="logout">Logout</a>
				</li>
				@endif
			</ul>
		</div>
	</nav>