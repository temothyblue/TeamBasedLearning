<?php 
	include('../connect.php');
	include('./rut.php');
	if(isset($_POST['action'])){
		//$idusr=$_POST["idusr"];
		//$rut=$_POST["rut"];
		//$user=$_POST["nameusr"];
		//$state = 0;
		if($_POST['action']=='contenido'){
			echo "<div class='card-bod'>
						<div class='row'>
							<div class='col-1'>	
								<?php echo'<img class='w-100 img-user' src='../../../public/img/'.$aEmisor[$i][0].'.ico' ?>'; ?>
							</div>
							<div class='col-7'> 
			    				<h5 class='card-title'><?php echo $aEmisor[$i].':'.$aContenido[$i]; ?></h5>
							</div>    
						</div>
			</div>";

		}
		if($_POST['action']=='muestra'){
			$at=[]; $aIdt=[];
			if ($resultado = mysqli_query($conn, "SELECT sala.id_sal, sala.nom_tema FROM sala INNER JOIN alumno ON alumno.id_sal=sala.id_sal WHERE id_alu=".$rut." AND estado=".'0'." AND time_sala<='".date("Y-m-d H:i:s")."'")) {
				while($rows = $resultado->fetch_array()){
			    	array_push($at,$rows["nom_tema"]);
				}   
				mysqli_free_result($resultado);
				echo json_encode($at);
			}
		}
	}
?>