<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../../public/css/style.css">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
	        $("input[name='file']").on("change", function(){
	            var formData = new FormData($("#uploadimage")[0]);
	            var ruta = "rx.php";
	            $.ajax({
	                url: ruta,
	                type: "POST",
	                data: formData,
	                contentType: false,
	                processData: false,
	                success: function(datos)
	                {
	                    $("#respuesta").html(datos);
	                }
	            });
	        });
	     });

	</script>
</head>
<body style='text-align: center'>
	
	<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
		<input type="file" name="file" id="file" required />
		<input type="submit" value="Upload" class="submit" />
	</form>
	<div id="respuesta"></div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../../../public/js/bootstrap.js"></script>
</body>
</html>