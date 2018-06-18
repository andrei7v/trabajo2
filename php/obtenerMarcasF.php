<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$idSubCategoria = $_POST["idSubCategoria"];

	$query = "SELECT * FROM marca WHERE mar_subcategoria = $idSubCategoria";
	$result = mysqli_query($conn, $query);
	$marcas = [];

	if (mysqli_num_rows($result)==0) {
		echo json_encode(["error"=>true, "message"=>"No hay datos"]);
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$marcas[$fila[0]] = $fila[1];
		}
	}

	echo json_encode(["error"=>false, "message"=>$marcas]);
	return;

?>

