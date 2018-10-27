<?php
	echo "			    <br>
						<div class='container rounded border-5 head-reciente'>
						  <div class='row'>
							<div class='col-sm-12 body-reciente'>
							  Actividad reciente
							</div>
						  </div>";
	$temas=10;
	if($temas==0){
		echo "			  <div class='row'>
							<div class='col-sm-12 header-reciente' style='text-align: center;'>
							  No existen Temas recientes.
							</div>
						  </div>";
	}
	else{
		$flag=True;
		for($i=0;$i<$temas;$i++){
			if($i<5){
			echo "		  <div class='row'>
							<div class='col-sm-3 link-reciente'>
							  Curso
							</div>
							<div class='col-sm-5 link-reciente'>
							  Tema
							</div>
							<div class='col-sm-2'>
							  Ultima actividad
							</div>
						  </div>";
			}
			else{
				if($flag==True){
					echo "<div class='row'>
							<div class='col-sm-12 header-reciente link-reciente' style='text-align: right;'>
							  Ver más
							</div>
						  </div>";
					$flag=False;
				}
			}
		}
	}
	echo "				</div>
						<br>";
?>    
    
		 

