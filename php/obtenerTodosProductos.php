<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$query = "SELECT prod_id, prod_nombre
			  FROM producto WHERE prod_stock > 0" ;
	$result = mysqli_query($conn, $query);

	$categorias = [];

	if (mysqli_num_rows($result)==0) {
		$msg = "No hay productos disponibles";
		echo json_encode(['error'=>false, 'message'=>$msg]);
		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$categorias[] = array('idproducto' => $fila[0], 'nombrep' => $fila[1]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$categorias]);
	return;

?>

