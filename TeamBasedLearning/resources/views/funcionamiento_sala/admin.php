<html>

<script type="text/javascript">
	function hide(){
		document.getElementById("01").style="display:none";
		document.getElementById("02").style="display:none";
		document.getElementById("03").style="display:none";
		document.getElementById("04").style="display:none";
		document.getElementById("05").style="display:none";
	}
	function Tema()   {hide();document.getElementById("01").style="display:show";}
	function Alumnos(){hide();document.getElementById("02").style="display:show";}
	function Cursos() {hide();document.getElementById("03").style="display:show";}
	function Add()    {hide();document.getElementById("04").style="display:show";}
	function Retro()    {hide();document.getElementById("05").style="display:show";}
	function Tabla()  {hide();location.href ="table.php";}
</script>

<body onload="hide()">

<button onclick="Tema()">Crear temas</button>
<button onclick="Alumnos()">Agregar alumnos</button>
<button onclick="Cursos()">Agregar cursos</button>
<button onclick="Tabla()">Ver tablas</button>
<button onclick="Add()">Añadir curso a Alumno</button>
<button onclick="Retro()">Enviar retroalimentación</button>

<div id="01">
	<h1>Crear tema</h1>
	<form method="post" action="switch-admin.php">
	<h5>Nombre tema:</h5><input type="text" name="nom_tema">
	<h5>Maximo de integrantes:</h5><input type="text" name="max_sal" value="5">
	<h5>Estado del tema:</h5><input type="text" name="estado" value="Abierto">
	<h5>Codigo de curso:</h5><input type="text" name="cod_cur">
	<input type="hidden" name="name_session" value=<?php echo$_SESSION["username"]; ?>>
	<input type="submit" name="enviar_tema" value="Crear tema">
	</form>
</div>

<div id="02">
	<h1>Agregar alumnos</h1>
	<form method="post" action="switch-admin.php">
	<h5>Rut alumno (Sin puntos ni guión):</h5><input type="text" name="rut_alu">
	<h5>Nombre alumno:</h5><input type="text" name="nom_alu">
	<h5>Apellido alumno:</h5><input type="text" name="ape_alu">
	<h5>Codigo de curso:</h5><input type="text" name="cod_cur">
	<h5>Nivel de usuario:</h5><input type="text" name="nivel" value="1">
	<input type="hidden" name="name_session" value=<?php echo$_SESSION["username"]; ?>>
	<input type="submit" name="enviar_alu" value="Agregar alumno">
	</form>

</div>

<div id="03">
	<h1>Agregar cursos</h1>
	<form method="post" action="switch-admin.php">
	<h5>Nombre curso:</h5><input type="text" name="nom_cur">
	<h5>Codigo de curso:</h5><input type="text" name="cod_cur">
	<input type="hidden" name="name_session" value=<?php echo$_SESSION["username"]; ?>>
	<input type="submit" name="enviar_cur" value="Agregar curso">
	</form>
</div>

<div id="04">
	<h1>Añadir cursos a un alumno</h1>
	<form method="post" action="switch-admin.php">
	<h5>Rut alumno:</h5><input type="text" name="rut_alu">
	<h5>Codigo de curso:</h5><input type="text" name="cod_cur">
	<input type="submit" name="add_curso" value="Añadir">
	<input type="hidden" name="name_session" value=<?php echo$_SESSION["username"]; ?>>
	</form>
</div>

<div id="05">
	<h1>Enviar retroalimentación</h1>
	<form method="post" action="switch-admin.php">
	<h5>ID Tema:</h5><input type="text" name="id_tema">
	<h5>Comentario:</h5><input type="text" name="comentario">
	<input type="submit" name="retro" value="Añadir">
	<input type="hidden" name="name_session" value=<?php echo$_SESSION["username"]; ?>>
	<input type="hidden" name="idusr" value=<?php echo$idusr; ?>>
	</form>
</div>
</form>