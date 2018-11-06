<?php 
	//Conectarse con el servidor
$conn = mysqli_connect('localhost','root','');

$foro = $_POST['foro'];
$comentario = $_POST['comentario'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$hoy = getdate();
$fecha = date("Y-M-D");

if(!$conn)
	{
		die("Ha fallado al conectarse." . mysqli_connect_error());
	}
else
	{
		$base = mysqli_select_db($conn,'imagenes');
		if (!$base)
		{
			echo "No se ha encontrado la base de datos.";	 
	 	}
 	}

$sql = "INSERT INTO imagenes (foro,imagen,comentario,fecha) VALUES ('$foro','$imagen','$comentario','$fecha')";

//$ejecutar =mysqli_query($conn,$sql);
//if (!$ejecutar)
//{
//	echo "Se ha producido un error.";
//}
//else
//{
//	header('Location: usuario_iniciado.php');
//}
?>