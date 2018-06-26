<?php 
	header('content-type: application/json');
	include 'conexion.php';

	// //permisos de entrada
	// session_start();
	// if (!isset($_SESSION['id'])) { //sin logear
	// 	$permisos = 0;
	// } else if ($_SESSION['role'] == 2) { //login admin
	// 	$permisos = 2;
  //  } else {  //login usuario
	// 	$permisos = 1;
  //   }
session_start();
$id = $_SESSION['id'];
	
	$query = "SELECT ven_id, ven_fecha, ven_costot
			  FROM ventas WHERE ven_usuario = $id
			  ORDER BY ven_id ASC
			  ";
	$result = mysqli_query($conn, $query);

	$ventas = [];

	if (mysqli_num_rows($result)==0) {
		// $msg = "No hay ventas disponibles";
		// echo json_encode(['error'=>false, 'message'=>$msg]);
		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$productos[] = array('idventa' => $fila[0], 'fecha' => $fila[1], 'costot' => $fila[2]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$productos]);
	return;

?>


