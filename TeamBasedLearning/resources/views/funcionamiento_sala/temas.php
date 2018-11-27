<?php
	include("connect.php");
	date_default_timezone_set("Chile/Continental");
	//echo "Time=: ".date("Y-m-d H:i:s",time()+60*60) ." "."<br>";

		if ($resultado = mysqli_query($conn, "SELECT id_alu FROM alumno WHERE nom_alu='".$userForm."'")) {
			while($rows = $resultado->fetch_array()){
			 	$rut=$rows["id_alu"]; 	
			}
		}
		if ($resultado = mysqli_query($conn, "SELECT id_us FROM usuario WHERE nom_us='".$userForm."'")) {
			while($rows = $resultado->fetch_array()){
			 	$idusr=$rows["id_us"]; 	
			}
		}
		//echo "<br> Bienvenid@ :".$user."  RUT: ".$rut."<br>";
		//echo "<br>Salas disponibles:<br>";
		$a=[]; $i=[]; $aId=[];
		if ($resultado = mysqli_query($conn, "SELECT sala.id_sal, sala.nom_tema FROM sala INNER JOIN alumno ON alumno.id_sal=sala.id_sal WHERE id_alu=".$rut." AND estado=".'0'." AND time_sala>='".date("Y-m-d H:i:s")."'")) {
			while($rows = $resultado->fetch_array()){
				array_push($a,$rows["nom_tema"]);
				array_push($aId,$rows["id_sal"]);
				//array_push($i,$rows["id_sal"]);
			}	
		}	    
		//echo "RUT: ".$rut."<br>";
		//echo "ID USUARIO: ".$idusr; 
?>
		<html>
			<form method="post" action="chat.php">
			<!--<form action="http://localhost:8000">-->
			<h1>Salas disponibles:</h1><br>
			<?php 

			for ($i=0; $i <count($a) ; $i++) {  ?>
			<h3><?php echo $a[$i].":"; ?></h3><input name="sal" type="submit" value=<?php echo$aId[$i]; ?>>
											  <input type="hidden" value=<?php echo $aId[$i];  ?> ><br>
<?php
	}
?>			
			<input type="hidden" name="idusr" value=<?php echo $idusr; ?>>
			<input type="hidden" name="nameusr" value=<?php echo $userForm; ?>>
			<input type="hidden" name="rut" value=<?php echo $rut; ?>>
			</form>
		</html>


