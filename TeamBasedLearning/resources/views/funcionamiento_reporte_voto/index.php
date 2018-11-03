<?php
	include('modalReporte.html');
	include('modalResponseReporte.html');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../../public/css/style.css">
	<script type="text/javascript">
		function reporte(){
			var id=document.getElementById('id-coment').value;
			var reportName=document.getElementById('report-name').value;
			var reportText=document.getElementById('report-text').value;
			var parametros = {
				"action"	 : 'report',
				"id"         : id,
				"reportName" : reportName,
				"reportText" : reportText
			};
			$.ajax({
				data : parametros,
				url	 : './rx.php', //direccion que recibe
				type : 'post',
				beforeSend: function () {
					console.log("Procesando, espere por favor...");
				},
				success: function(response){
					console.log(response);
					var reportName=document.getElementById('report-name').value='';
					var reportText=document.getElementById('report-text').value='';
					$("#modalResponseReporte").modal();
				}
			});
		}
	</script>
</head>
<body style='text-align: center'>
	<input type="text" class="text" placeholder="id comentario" id="id-coment">
	<button class="button" id="userNumber" data-toggle='modal' data-target='#modalReporte'>Reporte</button>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../../../public/js/bootstrap.js"></script>
</body>
</html>