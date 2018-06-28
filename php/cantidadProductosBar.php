<?php 
	header("Content-type: application/json");
	include 'conexion.php';

	// Obtenemos los productos de la base de datos
	$query = "SELECT prod_id, prod_nombre FROM producto WHERE prod_estado=1";
	$result = mysqli_query($conn, $query);
	$productos = [];
	$cantidad = [];
	while ($fila=mysqli_fetch_array($result)) {
		$query2 = "SELECT * FROM deta_ventas WHERE deta_producto=$fila[0]";
		$result2 = mysqli_query($conn, $query2);
		$quantity = mysqli_num_rows($result2);
		// Agregar a nuestro array de productos
		array_push($productos, $fila[1]);
		array_push($cantidad, $quantity);

	}
	//var_dump($data);
	echo json_encode(["productos"=>$productos, "cantidades"=>$cantidad]);
	return;
?>