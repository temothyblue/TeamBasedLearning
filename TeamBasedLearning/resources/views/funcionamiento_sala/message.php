<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="view.php">
		<input type="text" name="msj">
		<input type="submit" name="ok">
		<input type="hidden" name="sal" value=<?php echo $sala ?>>
		<input type="hidden" name="idusr" value=<?php echo $idusr ?>>
		<input type="hidden" name="nameusr" value=<?php echo $user ?>>
	</form>
</body>
</html>