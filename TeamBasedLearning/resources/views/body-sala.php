<?php


?>


<html>
	<link rel="stylesheet" type="text/css" href="../public/css/body-sala.css">

	<body>
		<div class="container"> <!--CONTAINER-->
			<div class="row"><!--ROW-->
			  <div class="col-4 info-zone"><!--COL SECCION DE INFORMACIÓN-->
			  	<button type="button" class="btn btn-primary btn-lg btn-block btn-namesala">
			  		<h5 id="name-sala">NOMBRE FORO</h5>
			  	</button>

			  	<h4><center>Paricipantes</center></h4>
			  	<center>
				  	<table border=1>
				  		<tr>
				  			<td id="p-user1" class="user-par">FOTO1</td>
				  			<td id="p-user2" class="user-par">FOTO2</td>
				  			<td id="p-user3" class="user-par">FOTO3</td>
				  			<td id="p-user4" class="user-par">FOTO4</td>
				  		</tr>
				  		<tr>
				  			<td id="n-user1" class="user-par">NOMBRE1</td>
				  			<td id="n-user2" class="user-par">NOMBRE2</td>
				  			<td id="n-user3" class="user-par">NOMBRE3</td>
				  			<td id="n-user4" class="user-par">NOMBRE4</td>
				  		</tr>
				  	</table>
			  	</center>

			  	<h5><center>Administrador</center></h5>
			  	<center>
				  	<table border=1>
				  		<tr>
				  			<td id="p-adm" class="user-par">FOTOADM</td>
				  		</tr>
				  		<tr>
				  			<td id="n-adm" class="user-par">NOMBREADM</td>
				  		</tr>
				  	</table>
			  	</center>

			  	<h5><center>Material anexo</center></h5>
			  	<center>
			  		<button type="button" class="btn btn-danger">BOTÓN PREGUNTA</button>
					<button type="button" class="btn btn-warning">BOTÓN ARCHIVOS</button>
			  	</center>
			  </div><!--CIERRA - COL SECCION DE INFORMACIÓN-->




			  <div class="col-8 foromsj-zone"><!--COL SECCION DE FORO Y MENSAJES-->		
			  	<div class="row foro-zone"> <!--COL SUBSECCION DE FORO-->
			  		
			  	</div>

			  	<div style="" class="row msj-zone"><!--COL SUBSECCION DE MENSAJES-->
			  		<textarea id="textarea1" rows="100%" cols="73">Escribir mensaje...
					</textarea>
					<button href="#" class="btn btn-primary">
			          <span class="glyphicon glyphicon-send"></span> Enviar 
			        </button>
			  	</div>

			  </div><!--CIERRA - COL SECCION DE FORO Y MENSAJES-->
			</div><!--ROW-->
			
		</div><!--CONTAINER-->
		

	</body>
</html>

<?php


?>