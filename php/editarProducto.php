<?php 
	header('content-type: application/json');
	include 'conexion.php';
	
    $id = $_POST["idE"];
    
	$nombre = $_POST["nombreE"];
	$precio = $_POST["precioE"];
	$stock = $_POST["stockE"];
	$descripcion = $_POST["descripcionE"];

	$categoria = $_POST["cboCategoriasE"];
	$subCategoria = $_POST["cboSubCategoriasE"];
    $marca = $_POST["cboMarcasE"];
    
	$url = $_POST["urlE"];
	
	$nombreImagen = $_FILES["imagen-prodE"]["name"];

	$archivo = $_FILES["imagen-prodE"]["tmp_name"];

	$ruta = "imagenes";
	$ruta = $ruta."/".$nombreImagen;



	// Validar que los inputs no esten vacios
	if ($nombre == "") {
		$msg = "Ingrese nombre del producto";
		echo json_encode(['error'=>true, 'message'=>$msg]);
		return;
	}

	if ($precio == "") {
		$msg = "Ingrese precio del producto";
		echo json_encode(['error'=>true, 'message'=>$msg]);
		return;
    }
    
	if ($descripcion == "") {
		$msg = "Ingrese descripcion del producto";
		echo json_encode(['error'=>true, 'message'=>$msg]);
		return;
	}

	if ($stock == "") {
		$msg = "Ingrese stock del producto";
		echo json_encode(['error'=>true, 'message'=>$msg]);
		return;
    }
    if ($stock < 1) {
		$msg = "Debe contener minimo una unidad en stock";
		echo json_encode(['error'=>true, 'message'=>$msg]);
		return;
	}

	if ($url == "") {
		$msg = "Ingrese url de la producto";
		echo json_encode(['error'=>true, 'message'=>$msg]);
		return;
	}

if ($nombreImagen == '') {
	        $query = "UPDATE producto SET prod_nombre='".$nombre."',
                                    prod_marca=".$marca.",
                                    prod_descripcion='".$descripcion."',
                                    prod_precio=".$precio.",
																		prod_stock=".$stock.",
                                    prod_url='".$url."'
                                    WHERE prod_id=$id";
		$result = mysqli_query($conn, $query);
} else {
	        $query = "UPDATE producto SET prod_nombre='".$nombre."',
                                    prod_marca=".$marca.",
                                    prod_descripcion='".$descripcion."',
                                    prod_precio=".$precio.",
                                    prod_stock=".$stock.",
                                    prod_imagen='".$nombreImagen."',
                                    prod_url='".$url."'
                                    WHERE prod_id=$id";
		$result = mysqli_query($conn, $query);
}


    //     $query = "UPDATE producto SET prod_nombre='".$nombre."',
    //                                 prod_marca=".$marca.",
    //                                 prod_descripcion='".$descripcion."',
    //                                 prod_precio=".$precio.",
    //                                 prod_stock=".$stock.",
    //                                 prod_imagen='".$nombreImagen."',
    //                                 prod_url='".$url."'
    //                                 WHERE prod_id=$id";
		// $result = mysqli_query($conn, $query);

		if ($result) {
			echo json_encode(['error'=>false, 'message'=>'Pelicula registrada correctamente','nombreimagen'=>$query]);
			return;
		} else {
			$msg = "Error en la base de datos1";
			echo json_encode(['error'=>true, 'message'=>$msg,'cosa'=>$query]);
			return;
		}


?>

