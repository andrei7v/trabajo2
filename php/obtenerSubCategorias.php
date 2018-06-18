<?php 
header("Content-type: application/json");
include 'conexion.php';
	$query = "SELECT *
			  FROM subcategoria";
	$result = mysqli_query($conn, $query);

	$categorias = [];

	if (mysqli_num_rows($result)==0) {
		$msg = "No hay subcategorias disponibles";
		echo json_encode(['error'=>false, 'message'=>$msg]);
		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$subCategorias[] = array('idsubcategoria' => $fila[0], 'nombre' => $fila[1]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$subCategorias]);
	return;

?>


	<!-- header("Content-type: application/json");
	include 'conexion.php';

	$idCategoria = $_POST["idCategoria"];

	$query = "SELECT * FROM subcategoria WHERE sub_categoria = $idCategoria";
	$result = mysqli_query($conexion, $query);
	$subCategorias = [];

	if (mysqli_num_rows($result)==0) {
		echo json_encode(["error"=>true, "message"=>"No hay datos"]);
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$subCategorias[$fila[0]] = $fila[1];
		}
	}

	echo json_encode(["error"=>false, "message"=>$subCategorias]);
	return;



 -->
