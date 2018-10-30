<?php
	include('test_c.php');
	include('modalReciente.php');
	echo "				<br>
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
		for($i=0;$i<count($row);$i++){
			if($i<5){
			echo "		  <div class='row'>
							<div class='col-sm-3 link-reciente'>";
			echo $row[$i][1];
			echo "		    </div>
							<div class='col-sm-5 link-reciente'>";
			echo $row[$i][2];
			echo "			</div>
							<div class='col-sm-2'>";
			echo $row[$i][3];
			echo "			</div>
							</div>";
			}
			else{
				if($flag==True){
					echo "<div class='row'>
							<div class='col-sm-12 header-reciente link-reciente' style='text-align: right;'  id='btnLogin' data-toggle='modal' data-target='#modalReciente'>
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
    
		 

