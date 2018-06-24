<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$id = $_POST["imagen"];

	$query = "SELECT prod_nombre, prod_descripcion, prod_imagen
			  FROM producto WHERE prod_id=$id";
	$result = mysqli_query($conn, $query);

	$producto = [];

	if (mysqli_num_rows($result)==0) {
		$msg = "No hay imagen disponible";
		echo json_encode(['error'=>false, 'message'=>$msg]);
		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$producto[] = array('nombre' => $fila[0], 'descripcion' => $fila[1], 'imagen' => $fila[2]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$producto]);
	return;

?>


