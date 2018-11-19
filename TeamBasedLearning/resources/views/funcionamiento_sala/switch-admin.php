<?php
	include("connect.php");


	//SI EL ADMIN SELECCIONO ENVIAR RETROALIMENTACIÓN
	if (isset($_REQUEST['retro'])){
		$id_tema = $_POST["id_tema"];
		$comentario = $_POST["comentario"];
		$idusr = $_POST["idusr"];
		$query = "INSERT INTO retro (id_retro,id_tema,comentario,id_us) VALUES(NULL,'".$id_tema."','".$comentario."','".$idusr."')";
		if(mysqli_query($conn, $query)){
				echo "<script>alert('El ingreso fue exitoso');</script>";
				header("Location: index.php");
			}
		else{
			echo "<script>alert('El ingreso no fue exitoso');</script>";
		}
	}

	//SI EL ADMIN SELECCIONO AGREGAR CURSO
	if (isset($_REQUEST['add_curso'])){
		$cod_cur=$_POST["cod_cur"];
		$rut_alu=$_POST["rut_alu"];
		$aParticipantes=[];
		//CONSULTA PARA OBTENER TODOS LOS REGISTROS DE LA TABLA ALUMNO A PARIR DE SU RUT
		$query = "SELECT * FROM alumno WHERE id_alu='".$rut_alu."'";
		$aData=[];
		if ($resultado = mysqli_query($conn,$query)){
			while($rows = $resultado->fetch_array()){
				array_push($aData,$rows["id_alu"]);
				array_push($aData,$rows["nom_alu"]);
				array_push($aData,$rows["ape_alu"]);
				array_push($aData,$cod_cur);
				array_push($aData,0);
			}
			//CONSULTA PARA INSERTAR UN ALUMNO ASOCIADO A UN CURSO
			$query2="INSERT INTO `alumno`(`id_alu`, `nom_alu`, `ape_alu`, `cod_cur`, `id_sal`) VALUES('".$aData[0]."','".$aData[1]."','".$aData[2]."','".$aData[3]."',".$aData[4].")";
			if(mysqli_query($conn, $query2)){
				echo "<script>alert('El ingreso fue exitoso');</script>";
				header("Location: index.php");
			}
			else{
				echo "<script>alert('El ingreso no fue exitoso');</script>";
			}
		}else{
			echo "<script>alert('Rut invalido');</script>";
		}
	}
	//SI EL ADMIN SELECCIONO AGREGAR ALUMNO
	if (isset($_REQUEST['enviar_alu'])){
		$cod_cur=$_POST["cod_cur"];
		$rut_alu=$_POST["rut_alu"];
		$nom_alu=$_POST["nom_alu"];
		$ape_alu=$_POST["ape_alu"];
		$nivel=$_POST["nivel"];

		//UNA CONSULTA PARA LA TABLA ALUMNO Y UNA PARA LA TABLA USUARIO
		$sql1 = "INSERT INTO `alumno`(`id_alu`, `nom_alu`, `ape_alu`, `cod_cur`, `id_sal`) VALUES ('".$rut_alu."','".$nom_alu."','".$ape_alu."','".$cod_cur."','')";
		$sql2 = "INSERT INTO `usuario`(`id_us`, `nom_us`, `ape_us`, `nivel`,`pass`) VALUES (null,'".$nom_alu."','".$ape_alu."',1,'".$rut_alu."')";
		if(mysqli_query($conn, $sql2)){
			if(mysqli_query($conn, $sql1)){
				echo "EXITO";
				header("Location: index.php");
			}
		}
	}
	//SI EL ADMIN SELECCIONO AGREGAR CURSO
	if (isset($_REQUEST['enviar_cur'])){
		$nom_cur=$_POST["nom_cur"];
		$cod_cur=$_POST["cod_cur"];
		//CONSULTA PARA AGREGAR UN NUEVO CURSO
		$sql1 = "INSERT INTO `curso`(`cod_cur`, `nom_cur`) VALUES ('".$cod_cur."','".$nom_cur."')";
		if(mysqli_query($conn, $sql1)){
			echo "EXITO";
			header("Location: index.php");
		}
	}

	//CONSULTA PARA AGREGAR UN NUEVO TEMA
	if (isset($_REQUEST['enviar_tema'])){
		$nom_tema=$_POST["nom_tema"];
		$max_sal=$_POST["max_sal"];
		$estado =$_POST["estado"]; if($estado=="Abierto"){$estado=0;} else{$estado=1;}
		$cod_cur=$_POST["cod_cur"];

		#Creo el tema y lo agrego a la tabla cursos
		$sql1 = "INSERT INTO temas(id_tema, nom_tema, cod_cur) VALUES (NULL,'".$nom_tema."','".$cod_cur."')";
		if(mysqli_query($conn, $sql1)){
			echo "MIRA";
			$a_alu = []; //Es un arreglo que almacenará alumnos
			#Busco los alumnos que no tienen sala y pertenezcan a ese curso
			$sql2="SELECT * FROM alumno WHERE id_sal=0 AND cod_cur='".$cod_cur."'";
			if($resultado = mysqli_query($conn,$sql2)){
				while($rows = $resultado->fetch_array()){
					array_push($a_alu,$rows["id_alu"]);
				}
				mysqli_free_result($resultado); 
			}
			//El tope del ciclo es un multiplo de 5 porque este es el numero maximo de integrantes 
			$tope = floor(count($a_alu)/5);
			$cont=0;
			for ($i=0; $i <=$tope ; $i++) { 
				#Inserto una nueva sala en la tabla
				echo "<br><br>Entre al cilo con: ".$i."<br><br>";
				$sql3="INSERT INTO sala(id_sal,nom_tema,max_sal,estado,cod_cur) values (NULL,'".$nom_tema."',".$max_sal.",".$estado.",'".$cod_cur."')";
				if(mysqli_query($conn,$sql3)){
					//Selecciono la sala recien creada, osea la de mayor id y lo guardo en una variable
					if($res = mysqli_query($conn,"SELECT MAX(id_sal) FROM sala")){
						while($fila = $res->fetch_array()){
							//echo "<br>A LA SALA NRO: ".$fila["MAX(id_sal)"]."<br>";
							$id_sal=$fila["MAX(id_sal)"];
						}	
					}												
				}
				//Ingreso 5 alumnos a la tabla
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
		header("Location: index.php");
	}
?>