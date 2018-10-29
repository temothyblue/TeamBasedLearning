<?php
$servername = "localhost";
$database = "reciente";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($resultado = mysqli_query($conn, "SELECT * FROM reciente")) {
    //$fila = mysqli_fetch_row($resultado);
    while($rows = $resultado->fetch_array()){
    	$row[] = $rows;
    }
    mysqli_free_result($resultado);
}
mysqli_close($conn);
?>
