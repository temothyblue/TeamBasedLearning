<?php

$sala = $_POST["sal"];
echo "<br>"."Nombre de la sala: ".$sala."<br>";
include("connect.php");


if (isset($_REQUEST['ok'])){
	$msj=$_POST["msj"];
	$fecha=date("Y-m-d");
	$idusr=$_POST["idusr"];
	$user=$_POST["nameusr"];

	$q="INSERT INTO `mensaje`(`id`, `emisor`, `id_emisor`, `fecha`, `contenido`, `sala`) VALUES (NULL,'".$user."',".$idusr.",'".$fecha."','".$msj."','".$sala."')";

	if(mysqli_query($conn, $q)){
		#echo "Records inserted successfully";
	} else{
		#echo "ERROR: Could not able to execute";
	}
} 


$idusr=$_POST["idusr"];
$user=$_POST["nameusr"];
echo "Id Usuario=".$idusr."<br>";
echo "Nombre Usuario=".$user."<br>";
$state = 0;
if ($resultado = mysqli_query($conn, "SELECT estado FROM sala WHERE nom_sal="."'".$sala."'")) {
		while($rows = $resultado->fetch_array()){
	    	$state =$rows["estado"];
		}   
		if($state==0){echo "Estado: ABIERTA <br><br>"; } else{echo "Estado: CERRADA<br><br>";}	
	}

if ($resultado = mysqli_query($conn, "SELECT * FROM sala INNER JOIN alumno ON alumno.cod_cur=sala.cod_cur WHERE sala.nom_sal="."'".$sala."'")) {
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

