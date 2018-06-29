<?php 
	header('content-type: application/json');
	include 'conexion.php';

session_start();
$id = $_SESSION['id'];
	
	$query = "SELECT ven_id, ven_fecha, ven_costot
			  FROM ventas WHERE ven_usuario = $id
			  ORDER BY ven_id ASC
			  ";
	$result = mysqli_query($conn, $query);

	$ventas = [];

	if (mysqli_num_rows($result)==0) {

		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$productos[] = array('idventa' => $fila[0], 'fecha' => $fila[1], 'costot' => $fila[2]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$productos]);
	return;

?>


