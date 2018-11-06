<html>

<?php
	
	include("connect.php");
	if (isset($_REQUEST['add_curso'])){
		$cod_cur=$_POST["cod_cur"];
		echo "ok";
		
	}

	if (isset($_REQUEST['enviar_alu'])){
		$cod_cur=$_POST["cod_cur"];
		$rut_alu=$_POST["rut_alu"];
		$nom_alu=$_POST["nom_alu"];
		$ape_alu=$_POST["ape_alu"];
		$nivel=$_POST["nivel"];


		$sql1 = "INSERT INTO `alumno`(`id_alu`, `nom_alu`, `ape_alu`, `cod_cur`, `id_sal`) VALUES ('".$rut_alu."','".$nom_alu."','".$ape_alu."','".$cod_cur."','')";
		$sql2 = "INSERT INTO `usuario`(`id_us`, `nom_us`, `ape_us`, `nivel`) VALUES (NULL,'".$nom_alu."','".$ape_alu."',1)";
		if(mysqli_query($conn, $sql2)){
			if(mysqli_query($conn, $sql1)){
				echo "EXITO";
			}
		}
	}

	if (isset($_REQUEST['enviar_cur'])){
		$nom_cur=$_POST["nom_cur"];
		$cod_cur=$_POST["cod_cur"];
		$sql1 = "INSERT INTO `curso`(`cod_cur`, `nom_cur`) VALUES ('".$cod_cur."','".$nom_cur."')";
		if(mysqli_query($conn, $sql1)){
			echo "EXITO";
		}
	}


	if (isset($_REQUEST['enviar_tema'])){
		$nom_tema=$_POST["nom_tema"];
		$max_sal=$_POST["max_sal"];
		$estado =$_POST["estado"]; if($estado=="Abierto"){$estado=0;} else{$estado=1;}
		$cod_cur=$_POST["cod_cur"];



		#Creo el tema y lo agrego a la tabla cursos
		$sql1 = "INSERT INTO temas(id_tema, nom_tema, cod_cur) VALUES (NULL,'".$nom_tema."','".$cod_cur."')";
		if(mysqli_query($conn, $sql1)){
			echo "MIRA";
			$a_alu = [];
			#Busco los alumnos que no tienen sala
			$sql2="SELECT * FROM alumno WHERE id_sal=0 AND cod_cur='".$cod_cur."'";
			if($resultado = mysqli_query($conn,$sql2)){
				while($rows = $resultado->fetch_array()){
					array_push($a_alu,$rows["id_alu"]);

				}
				mysqli_free_result($resultado); 
			}
				
			$tope = floor(count($a_alu)/5);$cont=0;
			for ($i=0; $i <=$tope ; $i++) { 
				#Inserto una nueva sala en la tabla
				echo "<br><br>Entre al cilo con: ".$i."<br><br>";
				$sql3="INSERT INTO sala(id_sal,nom_tema,max_sal,estado,cod_cur) values (NULL,'".$nom_tema."',".$max_sal.",".$estado.",'".$cod_cur."')";
				if(mysqli_query($conn,$sql3)){
					if($res = mysqli_query($conn,"SELECT MAX(id_sal) FROM sala")){
						while($fila = $res->fetch_array()){
							echo "<br>A LA SALA NRO: ".$fila["MAX(id_sal)"]."<br>";
							$id_sal=$fila["MAX(id_sal)"];
						}
							
					}												
				}

				for ($j=1; $j <=5; $j++) { 
					
					if($cont==count($a_alu)){
						echo "No hay mas alumnos que ingresar<br>";
					}
					else{
						echo "<br><br>Voy a meter al usuario ".$a_alu[$cont]." <br><br>";
						$sql4="UPDATE alumno SET id_sal='".$id_sal."' WHERE cod_cur='".$cod_cur."' AND id_alu='".$a_alu[$cont]."'";	
						mysqli_query($conn,$sql4);
						$cont++;
					}
					
				}

			}

				
		}		
	}
?>