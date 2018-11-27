<?php
session_start();

function borrar_comentario($arg){
	include("conexion.php");
	$query="DELETE FROM Comentarios where id_comentario=$arg";
	$resultado=$conexion -> query($query);
	if ($resultado){
	header('Location: admin.php');
	}else
	{
	echo "Se ha producido un error.";
	}