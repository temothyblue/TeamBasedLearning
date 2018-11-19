<?php
	include("connect.php");
	$_SESSION["username"]=$userForm;
	$q="SELECT nom_us FROM usuario WHERE nom_us='".$userForm."'";
	$resultado=mysqli_query($conn, $q);
	$rows = $resultado->fetch_array();
	if($rows>0){
		$idusr=0;
		//CONSULTA PARA OBTENER EL ID Y NIVEL DEL USUARIO A PARTIR DEL NOMBRE DE USUARIO
		if ($resultado = mysqli_query($conn, "SELECT id_us,nivel FROM usuario WHERE nom_us='".$userForm."'")) {
			while($rows = $resultado->fetch_array()){

				$idusr=$rows["id_us"]; 
				if($rows["nivel"]==0){
			 		//SI EL NIVEL ES 0, VA A LA PAGINA DEL ADMINISTRADOR
			 		include_once("admin.php");
			 	}
			 	else{
				 	//SI EL NIVEL NO ES 0, VA A LA PAGINA PARA USUARIOS NORMALES
				 	include_once("temas.php");
				}
			}
		}
	}
	
?>