<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$query = "SELECT prod_nombre, prod_descripcion, prod_precio,
                  prod_marca, prod_imagen
    			  FROM producto
			      ";
	$result = mysqli_query($conn, $query);

	$cards = [];

	if (mysqli_num_rows($result)==0) {
		$msg = "No hay productos disponibles";
		echo json_encode(['error'=>false, 'message'=>$msg]);
		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$cards[] = array('nombre' => $fila[0], 'descripcion' => $fila[1], 'precio' => $fila[2],'marca' => $fila[3],'rutaimagen' => $fila[4]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$cards]);
	return;

?>


