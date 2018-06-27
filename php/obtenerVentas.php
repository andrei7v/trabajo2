<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$query = "SELECT v.ven_id, v.ven_fecha, v.ven_costot, u.usu_name
			  FROM ventas v
        INNER JOIN usuario u
        ON v.ven_usuario = u.usu_id
			  ORDER BY ven_id ASC
			  ";
	$result = mysqli_query($conn, $query);

	$productos = [];

	if (mysqli_num_rows($result)==0) {
		// $msg = "No hay ventas disponibles";
		// echo json_encode(['error'=>false, 'message'=>$msg]);
		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$productos[] = array('idventa' => $fila[0], 'fecha' => $fila[1], 'costot' => $fila[2],'nombreusu' => $fila[3]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$productos]);
	return;

?>


