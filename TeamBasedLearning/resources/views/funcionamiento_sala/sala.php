<style>
input{
	width: 200px;
}
</style>
<?php
include("connect.php");

if (isset($_REQUEST['iniciar'])){
	$user=$_POST["usuario"];
	$q="SELECT nom_us FROM usuario WHERE nom_us='".$user."'";
	$resultado=mysqli_query($conn, $q);
	$rows = $resultado->fetch_array();
	if($rows>0){
		$idusr=0;
		if ($resultado = mysqli_query($conn, "SELECT id_us,nivel FROM usuario WHERE nom_us='".$user."'")) {
			while($rows = $resultado->fetch_array()){
			 	$idusr=$rows["id_us"]; 	
			 	if($rows["nivel"]==0){ header("Location: admin.php"); }
			}

			echo "ID USUARIO: ".$idusr; 
		}

		if ($resultado = mysqli_query($conn, "SELECT id_alu FROM alumno WHERE nom_alu='".$user."'")) {
			while($rows = $resultado->fetch_array()){
			 	$rut=$rows["id_alu"]; 	
			}
		}
		echo "<br> Bienvenid@ :".$user."  RUT: ".$rut."<br>";
		echo "<br>Salas disponibles:<br>";
		$a=[]; $i=[];

		if ($resultado = mysqli_query($conn, "SELECT sala.id_sal, sala.nom_tema FROM sala INNER JOIN alumno ON alumno.id_sal=sala.id_sal WHERE id_alu=".$rut)) {

			while($rows = $resultado->fetch_array()){

				//echo $rows["nom_tema"];
				array_push($a,$rows["nom_tema"]);
				//array_push($i,$rows["id_sal"]);
			}	
		}	    
		?>
		<html>
			<form method="post" action="view.php">
			<?php for ($i=0; $i <count($a) ; $i++) {  ?>
			<br><br><input name="sal" type="submit" value=<?php echo $a[$i]; } ?> >
			<input type="hidden" name="idusr" value=<?php echo $idusr ?>>
			<input type="hidden" name="nameusr" value=<?php echo $user ?>>
			<input type="hidden" name="rut" value=<?php echo $rut ?>>
			</form>
		</html>
<?php		
		}
		else{
			echo "<br> Usuario incorrecto <br>";
		}

	}
?>


