<?php 
	include("sala_session.php");
	$salaSession = new SalaSession();
	$salaSession->closeSession();
    header("location: ../index.php");
?>