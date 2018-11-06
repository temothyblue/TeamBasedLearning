<?php

$sala = $_POST["sal"];
echo "<br>"."Nombre de la sala: ".$sala."<br>";
include("connect.php");


if (isset($_REQUEST['ok'])){
	$msj=$_POST["msj"];
	$fecha=date("Y-m-d");
	$idusr=$_POST["idusr"];
	$user=$_POST["nameusr"];
	$rut=$_POST["rut"];

	$q="INSERT INTO `mensaje`(`id`, `emisor`, `id_emisor`, `fecha`, `contenido`, `sala`) VALUES (NULL,'".$user."',".$idusr.",'".$fecha."','".$msj."','".$sala."')";

	if(mysqli_query($conn, $q)){
		#echo "Records inserted successfully";
	} else{
		#echo "ERROR: Could not able to execute";
	}
} 


$idusr=$_POST["idusr"];
$rut=$_POST["rut"];
$user=$_POST["nameusr"];
echo "Id Usuario=".$idusr."<br>";
echo "Nombre Usuario=".$user."<br>";
$state = 0;
if ($resultado = mysqli_query($conn, "SELECT estado FROM sala WHERE nom_sal="."'".$sala."'")) {
		while($rows = $resultado->fetch_array()){
	    	$state =$rows["estado"];
		}   
		if($state==0){echo "Estado: ABIERTA <br><br>"; } else{echo "Estado: CERRADA<br><br>";}	
		mysqli_free_result($resultado);
	}

if ($resultado = mysqli_query($conn, "SELECT id_sal FROM alumno WHERE id_alu='".$rut."'")) {
		while($rows = $resultado->fetch_array()){
	    	$idsal =$rows["id_sal"];
		}  
	mysqli_free_result($resultado);
}


if ($resultado = mysqli_query($conn, "SELECT curso.cod_cur, nom_cur FROM sala INNER JOIN curso ON sala.cod_cur=curso.cod_cur WHERE sala.id_sal="."'".$idsal."'")) {
	echo  "<br>Sala perteneciente al curso: ";
	while($rows = $resultado->fetch_array()){
	 	echo "<br>".$rows["cod_cur"]." ".$rows["nom_cur"]."<br><br>";
	    }
	mysqli_free_result($resultado);
}
else{
	echo "No";
}


if ($resultado = mysqli_query($conn, "SELECT nom_alu FROM sala INNER JOIN alumno ON alumno.id_sal=sala.id_sal WHERE alumno.id_sal="."'".$idsal."'")) {
	echo  "Participantes: ";
	while($rows = $resultado->fetch_array()){
	 	echo "<br>".$rows["nom_alu"];
	    }
	mysqli_free_result($resultado);
}
else{
	echo "No";
}



if ($resultado = mysqli_query($conn, "SELECT emisor,contenido FROM mensaje WHERE sala="."'".$sala."'")) {
	echo  "<br><br>Mensajes: ";
	while($rows = $resultado->fetch_array()){
	    echo "<br>".$rows["emisor"].":";
	    echo $rows["contenido"];
	    }
	mysqli_free_result($resultado);
}


if($state==0){ include("message.php"); } 


?>

