<!DOCTYPE HTML>
	<!DOCTYPE html>
	<html lang="es">
	<meta charset="utf-8">
	<head>
		<link rel="stylesheet" type="text/css" href="">
	</head> 
		<body>
			<header>
				<h1> "Nombre foro" </h1>
			</header 			<section >
			<h2 style="text-align:left;">Sube tu imagen</h2>
			<form method="post" action="guardar_imagen.php" enctype="multipart/form-data" >
			 <p> Ingrese nombre del foro:</p>
			 <input type="text" REQUIRED name="foro" >
			 <p> Ingrese comentario.</p>
			 <input type="text" REQUIRED name="comentario" >
			 <p> Subir imagen:</p>
			 <input name="imagen" REQUIRED type="file" /><br>
			 <input type="submit" value="Subir">
			</form>
			</section >
		</body>
	</html>