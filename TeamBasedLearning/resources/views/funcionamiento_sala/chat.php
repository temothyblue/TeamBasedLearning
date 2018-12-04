<?php
include("./vistas/modalEstado.html");
include("data.php");
?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		var e = false;
		$('#confirmacion').click(function(){
			e = true;
		})
		window.onload = function(){
			setTimeout(function(){
				console.log("funciona");
				$('#modalEstado').modal('show');
				espera();
			}, 10000);
		};
		function timer0(){
			setTimeout(function(){
				console.log("funciona");
				$('#modalEstado').modal('show');
				espera();
			}, 10000);
		}
		function closeSala(){
			console.log("close_session");
			var parametros = {
				"action"	 : 'closeSala'
			};
			$.ajax({
				data : parametros,
				url	 : './includes/logout_sala.php', //direccion que recibe
				type : 'post',
				success: function(response){
					console.log(response);
					location.href ="./index.php";
				}
			});
		}
		function espera(){
			setTimeout(function(){
				if(e==true){
					timer0();
					e = false;
				}
				else{
					closeSala();
				}
			}, 5000);
		}
		
	</script>
	<link rel="stylesheet" type="text/css" href="temas.css">
	<div style="" id="cosa" class="head">
		<a class="col-1">ID Sala:<?php echo $idsal;  ?></a>
		<a class="col-1">Nombre del tema:<?php echo $sala; ?></a>
		<a class="col-1">Perteneciente al curso:<?php echo $cod_cur; echo " - ".$nom_cur; ?></a>
		<a class="col-1">ID Alumno: <?php echo $idusr; ?></a>
		<a class="col-1">Nombre Usuario:<?php echo $user; ?></a>
		<button class="regresar"><a href="index.php">REGRESAR</a></button>
	</div>
<div>
	<br><center><h1>Team Based Learning</h1></center><br>	
</div>
<html>
<link rel="stylesheet" type="text/css" href="../../../public/css/app.css">
<link rel="stylesheet" type="text/css" href="../../../public/css/style.css">
	<div class="container-fluid sub-ventana">
 		<div class="row">
			<div class="col-9 preguntas ">
				<div class="card w-100">
</html>
<?php
for ($i=0; $i <count($aContenido) ; $i++) { 
	$txt = "../../../public/img/".$aEmisor[$i][0]."ico";
	?>
	<html>
					<div class="card-body">
						<div class="row">
							<div class="col-1">	
								<?php echo"<img class='w-100 img-user' src='../../../public/img/".$aEmisor[$i][0].".ico' ?>"; ?>
							</div>
							<div class="col-7"> 
			    				<h5 class="card-title"><?php echo $aEmisor[$i].":".$aContenido[$i]; ?></h5>
							</div>    
							<div class="col-1 mr-4 ">    
							<a href="#" class="btn btn-primary">Responder</a>
							</div>  
							<div class="col-1 ml-4 ">    
							<a href="#" class="btn btn-danger">!</a>
							</div>  
						</div>
					</div>

	</html>
<?php
}
?>
					</div>
				</div>
			<div class="col-3"> <!--PANEL DERECHO-->
				<div class="container-fluid">
					<ul class="list-group sub-respuestas row">  
						<li class="list-group-item bg-primary ">Participantes</li>
					</ul>
					<div  class="">		
						<?php
							for ($i=0; $i <count($aParticipantes) ; $i++) { ?>
								<div class="row">
								
								<?php echo"<img class='col-3 ico' src='../../../public/img/".$aParticipantes[$i][0].".ico' ?>"; ?>
								<p class="col-1"><?php echo $aParticipantes[$i]; ?></p>
								</div>
								<?php
							}
						?>	
					</div>
				</div>


				<div class="container-fluid">
				<div class="list-group sub-respuestas row">
					<div style="height: 90px;" class="">
						<div class=" preguntas ">
							<div class="card w-100">
								<div  class="container-fluid">
									<ul class="list-group sub-respuestas row">  
										<li class="list-group-item bg-warning ">Retroalimentación</li>
									</ul>
									<ul>
										<?php for ($j=0; $j <count($aRetro) ; $j++) {  ?>
											
										<li><?php echo $aRetro[$j] ?></li>
									</ul>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>


				<div class="container-fluid">
					<ul class="list-group sub-respuestas row">  
						<li class="list-group-item bg-success ">Preguntas respondidas</li>
					</ul>
					<div  class="">		
						Esto se hace así
					</div>
				</div>

				<div class="container-fluid">
					<ul class="list-group sub-respuestas row">  
						<li class="list-group-item bg-danger ">Preguntas pendientes</li>
					</ul>
					<div  class="">		
						¿Como se hace esto?
					</div>
				</div>


				

			</div><!--PANEL DERECHO-->
		</div><?php if($state==0){ include("message.php"); } ?>
	</div>


</html>