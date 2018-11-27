<?php 
 $conexion = new mysqli("localhost","root","","TeamBasedLearning");
 if (!$conexion){
	 
	 echo "Error al conectar a la base de datos.";
 }
?>