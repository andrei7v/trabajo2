<?php 
	header('content-type: application/json');
	include 'conexion.php';
	
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$stock = $_POST['stock'];
	$descripcion = $_POST['descripcion'];

	$categoria = $_POST['cboCategorias'];
	$subCategoria = $_POST['cboSubCategorias'];
    $marca = $_POST['cboMarcas'];
    
    $url = $_POST['url'];

	$nombreImagen = $_FILES["imagen"]["name"];

	$archivo = $_FILES["imagen"]["tmp_name"];

	$ruta = "imagenes";
	$ruta = $ruta."/".$nombreImagen;

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

	if ($stock == "" || $stock == 0) {
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

	if (move_uploaded_file($archivo, $ruta)) {
		$query = "INSERT INTO producto(prod_nombre, prod_marca, prod_descripcion, prod_precio, prod_stock, prod_imagen, prod_url, prod_estado) 
				                VALUES('$nombre', $marca, '$descripcion', $precio, $stock, '$nombreImagen', '$url', 1)";
		$result = mysqli_query($conn, $query);

		if ($result) {
			echo json_encode(['error'=>false, 'message'=>'Producto registrado correctamente']);
			return;
		} else {
			$msg = "Error en la base de datos";
			echo json_encode(['error'=>true, 'message'=>$msg]);
			return;
		}
	} else {
		$msg = "Error en la subida de imagenes";
		echo json_encode(['error'=>true, 'message'=>$msg]);
		return;
	}

	
?>

