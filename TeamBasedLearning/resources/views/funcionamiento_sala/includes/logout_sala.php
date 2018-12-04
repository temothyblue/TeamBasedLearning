<?php 
	include("sala_session.php");
	if(isset($_POST['action'])){
		if($_POST['action']=='closeSala'){
			$salaSession = new SalaSession();
			$salaSession->closeSession();
			echo "OK";
		}
	}
?>