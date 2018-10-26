

<!DOCTYPE html>

	<head>
		<meta charset="utf-8">
		<title>Sala</title>
		@include('layout.header')
	</head>

	<body>
	 <link rel="stylesheet" href="{{ ('css/app.css') }}">
	 <link rel="stylesheet" href="{{ ('css/.css') }}">
		@yield('header')
		
	
	<div class="container-fluid">
		<div class="container-fluid text-center  m-3">
  			<h4 class="mx-auto"> Team Based Learning.</h4>
		</div>
		<div class="container">

<div class="card w-100">
  <div class="card-body">
   <div class="row">
	<div class="col-1">	
	<img src="./img/penguin.png"  class="w-100 img-user" />
	</div>
	<div class="col-1">
    		<h5 class="card-title">Joako:</h5>
	</div>    
	<div class="col-7 mr-5">		
		<p class="card-text">Tengo una duda sobre tanto...</p>
	</div>
	<div class="col-1 mr-4 ">    
		<a href="#" class="btn btn-primary">Responder</a>
	</div>  
	<div class="col-1 ">    
		<a href="#" class="btn btn-danger">!</a>
	</div>  
</div>
</div>
</div>
<br>


<div class="card  respuesta">
  <div class="card-body">
   <div class="row">
	<div class="col-1">	
	<img src="./img/rabbit.png"  class="w-100 img-user" />
	</div>
	<div class="col-1">
    		<h5 class="card-title">Usuario:</h5>
	</div>    
	<div class="col-7 mr-5">		
		<p class="card-text">Eso se hace asi...</p>
	</div>
	<div class="col-1 mr-4 ">    
		<a href="#" class="btn btn-success">Correcta</a>
	</div>  
	<div class="col-1 ">    
		<a href="#" class="btn btn-danger">!</a>
	</div>  
</div>
</div>
</div>
<br>
	<div class="row">
	<div class="col-11">
 		<input type="text" class="form-control" placeholder="Pregunta"> 
	</div>	
	<div class="col-1">
	<a href="#" class="btn btn-primary">Preguntar</a>
	</div>
	</div>
<br>





 


