<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title> COMENTARIOS ADMIN </title>
	<body>
		<h1><u> Bienvenido Admin  </u></h1>
		<hr>
	<h1><u> Tabla Comentarios </u></h1>
	<table border="2">
		<tr>
			<th> id_Comentario</th>
			<th> id_Usuario</th>
			<th> comentario</th>
			<th> Fecha</th>
			<th colspan="3" > Operacion</th>
		</tr>
		<?php
			$query3="select * from comentarios order by id_comentario desc";
			$resultado3= $conexion->query($query3);
			while ($row3 = $resultado3 -> fetch_assoc()){
			echo "<tr>";
			echo "<th>".$row3['id_comentario']."</th>";	
			echo "<th>".$row3['idusuario']."</th>";	
			echo "<th>".$row3['comentario']."</th>";
			echo "<th>".$row3['fecha']."</th>";		
			$_SESSION['admin']=$row3['id_comentario'];
			echo "<th><a href='eliminar_comentario.php?accion=3&id=".$row3['id_comentario']."'> ELIMINAR <a/><th>";
			}
		?>
	</table>
	</body>
</html>