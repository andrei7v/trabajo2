<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$idProducto = $_POST["idProducto"];
	$query = "SELECT prod_precio FROM producto WHERE prod_id = $idProducto";
	$result = mysqli_query($conn, $query);
	$producto = [];

	if (mysqli_num_rows($result)==0) {
		echo json_encode(["error"=>true, "message"=>"No hay datos"]);
	} else {
		while ($fila = mysqli_fetch_array($result)) {
            $producto[] = array('precio' => $fila[0]);
		}
	}

	echo json_encode(["error"=>false, "message"=>$producto]);
	return;

?>

