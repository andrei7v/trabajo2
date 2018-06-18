<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$query = "SELECT *
			  FROM categoria" ;
	$result = mysqli_query($conn, $query);

	$categorias = [];

	if (mysqli_num_rows($result)==0) {
		$msg = "No hay categorias disponibles";
		echo json_encode(['error'=>false, 'message'=>$msg]);
		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$categorias[] = array('idcategoria' => $fila[0], 'nombre' => $fila[1]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$categorias]);
	return;

?>

