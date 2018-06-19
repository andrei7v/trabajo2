<?php 

	header('Content-type: application/json');
	
	include 'conexion.php';

	// Recuperacion de valores
	$id = $_POST['idD'];

    
     $queryV = "SELECT * FROM producto WHERE prod_id=$id";
	 $resultV = mysqli_query($conn, $queryV);

	 if (mysqli_num_rows($resultV)==0) {
	 	echo json_encode(['error'=>true, 'message'=>'No existe el alumno a eliminar']);
	 	return;
	 }


	$consulta = "UPDATE producto SET prod_estado=0 WHERE prod_id=$id";

	$res = mysqli_query($conn, $consulta);

	if ($res) {
		echo json_encode(['error' => false, 'message' => 'Producto eliminado correctamente.']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Se ha producido un error.'.$id]);
		return;
	}
	
	return;
 ?>