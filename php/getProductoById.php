<?php 

	header('Content-type: application/json');
	
	include 'conexion.php';

	// Recuperacion de valores
	$idProducto = $_GET["id"];
	
	$consulta = "SELECT * FROM producto WHERE prod_id =".$idProducto;

	$res = mysqli_query($conn, $consulta);

	$producto = [];

	if ( mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_array($res)) {
			array_push($producto, [$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]]);
		}
	}
	echo json_encode($producto);
	return;
 ?>



 