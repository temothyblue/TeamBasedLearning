<?php
$id_sala = $_POST["sal"];
include_once 'includes/user.php';
include_once 'includes/user_session.php';
$userSession = new UserSession();
$user = new User();
if(isset($_SESSION['user'])){                                    //Si Hay sesion
    if((time()-$_SESSION["time"])>1800){                          //Cuantos segundos dura la sesión (30min)
    	echo "<script>alert('LA SESIÓN EXPIRÓ');</script>";
        $userSession->closeSession();
        header("location: index.php");
    }
    else{
        $_SESSION["time"]=time();
        $userForm=$_SESSION["user"];
    }
}
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
$state = 0;
//CONSULTA PARA OBTENER EL NOMBRE DEL TEMA A PARTIR DEL ID
if ($resultado = mysqli_query($conn, "SELECT nom_tema FROM sala WHERE id_sal=".$id_sala)) {
		while($rows = $resultado->fetch_array()){
	    	$sala=$rows["nom_tema"];
		}   
		mysqli_free_result($resultado);
	}
//CONSULTA PARA OBTENER EL ESTADO DEL TEMA A PARTIR DEL NOMBRE DE LA SALA
if ($resultado = mysqli_query($conn, "SELECT estado FROM sala WHERE nom_sal="."'".$sala."'")) {
		while($rows = $resultado->fetch_array()){
	    	$state =$rows["estado"];
		}   
		if($state==0){} else{}	
		mysqli_free_result($resultado);
	}
//CONSULTA PARA OBTENER EL ID DE LA SALA, TENIENDO COMO FILTRO EL RUT Y EL NOMBRE DE LA SALA
if ($resultado = mysqli_query($conn, "SELECT sala.id_sal FROM alumno INNER JOIN sala ON alumno.id_sal=sala.id_sal WHERE id_alu='".$rut."' and nom_tema='".$sala."'")) {
		while($rows = $resultado->fetch_array()){
	    	$idsal =$rows["id_sal"];
		}  
	mysqli_free_result($resultado);
}
//CONSULTA PARA OBTENER EL CODIGO Y NOMBRE DEL CURSO A PARTIR DEL ID DE LA SALA
if ($resultado = mysqli_query($conn, "SELECT curso.cod_cur, nom_cur FROM sala INNER JOIN curso ON sala.cod_cur=curso.cod_cur WHERE sala.id_sal="."'".$idsal."'")) {
	while($rows = $resultado->fetch_array()){
	 	$cod_cur=$rows["cod_cur"];$nom_cur=$rows["nom_cur"];
	    }
	mysqli_free_result($resultado);
}
else{
	//echo "No";
}
//CONSULTA PARA OBTENER LOS NOMBRES DE LOS ALUMNOS PERTENECIENES A UNA DETERMINADA SALA
if ($resultado = mysqli_query($conn, "SELECT nom_alu FROM sala INNER JOIN alumno ON alumno.id_sal=sala.id_sal WHERE alumno.id_sal="."'".$idsal."'")) {
	$aParticipantes=[];
	while($rows = $resultado->fetch_array()){
	 	array_push($aParticipantes,$rows["nom_alu"]);
	    }
	mysqli_free_result($resultado);
}
else{
	//echo "No";
}
//CONSULTA PARA OBTENER EL EMISOR Y EL CONTENIDO DE LOS MENSAJES DE UNA DETERMINADA SALA
if ($resultado = mysqli_query($conn, "SELECT emisor,contenido FROM mensaje WHERE sala="."'".$id_sala."'")) {
	$aEmisor=[];$aContenido=[];
	while($rows = $resultado->fetch_array()){
		array_push($aEmisor,$rows["emisor"]);
		array_push($aContenido,$rows["contenido"]);
		//pregunta($rows["emisor"],$rows["contenido"]);
	    }
	mysqli_free_result($resultado);
}
//CONSULTA PARA OBTENER LA RETROALIMENTACIÓN DE UN TEMA
$q1="SELECT retro.comentario FROM retro INNER JOIN temas ON retro.id_tema=temas.id_tema WHERE temas.nom_tema='".$sala."'";
if ($resultado = mysqli_query($conn, $q1)) {
	$aRetro=[];
	while($rows = $resultado->fetch_array()){
		array_push($aRetro,$rows["contenido"]);
	    }
	mysqli_free_result($resultado);
	if(count($aRetro)==0){
		$aRetro[0]="No hay retro alimentación";
	}
}


?>