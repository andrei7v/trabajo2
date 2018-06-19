<?php 

	header('Content-type: application/json');
	
	include 'conexion.php';

	// Recuperacion de valores
	$idProducto = $_GET["id"];
	
	// Validaciones internas en el servidor
	$consulta = "SELECT prod_id, prod_nombre FROM producto WHERE prod_id =".$idProducto;

	$res = mysqli_query($conn, $consulta);

	$producto = [];

	if ( mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_array($res)) {
			array_push($producto, [$row[0],$row[1]]);
		}
	}
	echo json_encode($producto);
	return;
 ?>