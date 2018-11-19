<style>
h3{
	font-family: "Tahoma";
}
td{
	width: 130px;
	font-family: "Arial";
	border: 1px solid black;
}
tr{
	width: 50px;
	border: 1px solid black;
}
table{
	border: 1px solid black;
}
</style>
<html>
	<h3>Tabla alumno</h3>
	<table>
		<tr>
			<td>NOMBRE</td>
			<td>APELLIDO</td>
			<td>CURSO</td>
			<td>SALA</td>
		</tr>
<?php
	include_once 'includes/user.php';
	include_once 'includes/user_session.php';
	$userSession = new UserSession();
	$_SESSION["username"]=$userSession->getCurrentUser();
	echo $_SESSION["username"];
	include("connect.php");
	$sql2="SELECT * FROM alumno";
	if($resultado = mysqli_query($conn,$sql2)){
		while($rows = $resultado->fetch_array()){
				echo "<tr>";
				echo "<td>".$rows["nom_alu"]."</td>";
				echo "<td>".$rows["ape_alu"]."</td>";
				echo "<td>".$rows["cod_cur"]."</td>";
				echo "<td>".$rows["id_sal"]."</td>";
				echo "</tr>";
		}
		mysqli_free_result($resultado); 
	}

?>
	</table><br>
	<h3>Tabla salas</h3>
	<table>
		<tr>
			<td>ID SALA</td>
			<td>TEMA</td>
			<td>MAXIMO</td>
			<td>ESTADO</td>
			<td>CURSO</td>
		</tr>
<?php

	$sql="SELECT * FROM sala";
	if($resultado = mysqli_query($conn,$sql)){
		while($rows = $resultado->fetch_array()){
				echo "<tr>";
				echo "<td>".$rows["id_sal"]."</td>";
				echo "<td>".$rows["nom_tema"]."</td>";
				echo "<td>".$rows["max_sal"]."</td>";
				echo "<td>".$rows["estado"]."</td>";
				echo "<td>".$rows["cod_cur"]."</td>";
				echo "</tr>";
		}
		mysqli_free_result($resultado); 
	}

?>
	</table><br>
	<h3>Tabla cursos</h3>
	<table>
		<tr>
			<td>ID</td>
			<td>TEMA</td>

		</tr>
<?php

	$sql="SELECT * FROM curso";
	if($resultado = mysqli_query($conn,$sql)){
		while($rows = $resultado->fetch_array()){
				echo "<tr>";
				echo "<td>".$rows["cod_cur"]."</td>";
				echo "<td>".$rows["nom_cur"]."</td>";
				echo "</tr>";
		}
		mysqli_free_result($resultado); 
	}

?>
	</table><br>	<h3>Tabla Temas</h3>
	<table>
		<tr>
			<td>ID TEMA</td>
			<td>NOMBRE DEL TEMA</td>
			<td>CURSO</td>
		</tr>
<?php

	$sql="SELECT * FROM temas";
	if($resultado = mysqli_query($conn,$sql)){
		while($rows = $resultado->fetch_array()){
				echo "<tr>";
				echo "<td>".$rows["id_tema"]."</td>";
				echo "<td>".$rows["nom_tema"]."</td>";
				echo "<td>".$rows["cod_cur"]."</td>";
				echo "</tr>";
		}
		mysqli_free_result($resultado); 
	}
?>
	</table>
</html>