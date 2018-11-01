<?php
include("connect.php");

if (isset($_REQUEST['iniciar'])){
	$user=$_POST["usuario"];
	$q="SELECT nom_alu FROM alumno WHERE nom_alu='".$user."'";
	$resultado=mysqli_query($conn, $q);
	$rows = $resultado->fetch_array();
	if($rows>0){
		$idusr=0;
		if ($resultado = mysqli_query($conn, "SELECT id_alu,nivel FROM alumno WHERE nom_alu='".$user."'")) {
			while($rows = $resultado->fetch_array()){
			 	$idusr=$rows["id_alu"]; 	
			 	if($rows["nivel"]==0){ header("Location: admin.php"); }
			}
			mysqli_free_result($resultado);  
			echo "ID USUARIO: ".$idusr; 
		}
		echo "<br> Bienvenid@ :".$user;
		echo "<br>Salas disponibles:<br>";
		$a=[]; $i=[];
		if ($resultado = mysqli_query($conn, "SELECT id_sal, nom_sal FROM sala INNER JOIN alumno ON alumno.cod_cur=sala.cod_cur WHERE nom_alu='".$user."'")) {
			while($rows = $resultado->fetch_array()){
				array_push($a,$rows["nom_sal"]);
				array_push($i,$rows["id_sal"]);
			}	
		}	    
		?>
		<html>
			<form method="post" action="view.php">
			<?php for ($i=0; $i <count($a) ; $i++) {  ?>
			<br><br><input name="sal" type="submit" value=<?php echo $a[$i]; } ?> >
			<input type="hidden" name="idusr" value=<?php echo $idusr ?>>
			<input type="hidden" name="nameusr" value=<?php echo $user ?>>
			</form>
		</html>
<?php		
		}
		else{
			echo "<br> Usuario incorrecto <br>";
		}

	}
?>


