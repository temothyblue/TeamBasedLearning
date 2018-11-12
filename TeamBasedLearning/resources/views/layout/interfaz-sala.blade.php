

<!DOCTYPE html>
<?php 

?>
	<head>
		<meta charset="utf-8">
		<title>Sala</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../../public/css/app.css">
	<link rel="stylesheet" type="text/css" href="../../../public/css/style.css">

</head>

	<body>


	<?php 
function titulo() { echo '
	<div class="container-fluid ventana">
		<div class="container-fluid text-center  m-3">
  			<h4 class="mx-auto"> Team Based Learning.</h4>
		</div>
		<div class="container">
		
<div class="container-fluid sub-ventana">
   <div class="row  ">
	<div class="col-10 preguntas ">
';}

function pregunta($nombre,$pregunta) { echo ' 
<div class="card w-100">
  <div class="card-body">
   <div class="row">
	<div class="col-1">	
	<img src="../../../public/img/penguin.png"  class="w-100 img-user" />
	</div>
	<div class="col-7"> 
    		<h5 class="card-title">'.$nombre.":".$pregunta.'</h5>
	</div>    
	<div class="col-1 mr-4 ">    
		<a href="#" class="btn btn-primary">Responder</a>
	</div>  
	<div class="col-1 ml-4 ">    
		<a href="#" class="btn btn-danger">!</a>
	</div>  
</div>
</div>
</div>
';}

function respuesta() { echo '
<div class="card  respuesta">
  <div class="card-body">
   <div class="row">
	<div class="col-1">	
	<img src="../../../public/img/rabbit.png"  class="w-100 img-user" />
	</div>
	<div class="col-2">
    		<h5 class="card-title">Usuario:</h5>
	</div>    
	<div class="col-5 mr-5">		
		<p class="card-text">Eso se hace asi...</p>
	</div>
	<div class="col-1 mr-4 ">    
		<a href="#" class="btn btn-success">Correcta</a>
	</div>  
	<div class="col-1 ml-4 ">    
		<a href="#" class="btn btn-danger">!</a>
	</div>  
</div>
</div>
</div>
<br>
';}

function bar() { echo '
</div>

<div class="col-2">
<div class="container-fluid ">
<ul class="list-group sub-respuestas">  

<li class="list-group-item bg-danger ">Preguntas sin resolver</li>
';}

function pregunta_sin_resolver($pregunta) { echo '
	<li class="list-group-item">'.$pregunta.'</li> 
	';}

function respuestas_bar() { echo '
</ul>

<br>

<ul class="list-group respuestas-resueltas sub-respuestas">
<li class="list-group-item bg-success">Preguntas solucionadas</li>' ;}
	
function preguntas_resueltas($pregunta) { echo '
  <li class="list-group-item ">'.$pregunta.'</li>';}



function bottom() { echo '
</ul>

<br>
</div>
</div>
</div>
<br>
	<div class="row">
	<div class="col-11">
 	';}


 


