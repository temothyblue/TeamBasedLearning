<?php
	include('../data.php');
		if ($resultado = mysqli_query($conn, "SELECT id_alu FROM alumno WHERE nom_alu='".$userForm."'")) {
			while($rows = $resultado->fetch_array()){
			 	$rut=$rows["id_alu"]; 	
			}
		}
?>