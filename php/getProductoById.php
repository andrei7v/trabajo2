<?php 

	header('Content-type: application/json');
	
	include 'conexion.php';

	$idProducto = $_GET["id"];
	
	$consulta = "SELECT p.prod_id, p.prod_nombre, m.mar_id, prod_descripcion, p.prod_precio, p.prod_stock, p.prod_url, p.prod_imagen, s.sub_id,c.cat_id
			  FROM producto p
              INNER JOIN marca m
			  ON p.prod_marca = m.mar_id
			  INNER JOIN subcategoria s
			  ON m.mar_subcategoria = s.sub_id
			  INNER JOIN categoria c
			  ON s.sub_categoria = c.cat_id
			  WHERE p.prod_id =".$idProducto;

	$res = mysqli_query($conn, $consulta);

	$producto = [];

	if ( mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_array($res)) {
			array_push($producto, [$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]]);
		}
	}

	$idCategoria = $producto[0][9];

	$query = "SELECT * FROM subcategoria WHERE sub_categoria =".$idCategoria;
	$result = mysqli_query($conn, $query);
	$subCategorias = [];

	if (mysqli_num_rows($result)!==0) {
		while ($fila = mysqli_fetch_array($result)) {
			$subCategorias[$fila[0]] = $fila[1];
		}
	}

	$idSubCategoria = $producto[0][8];

 	$query = "SELECT * FROM marca WHERE mar_subcategoria =".$idSubCategoria;
	$result = mysqli_query($conn, $query);
	$marcas = [];

	if (mysqli_num_rows($result)!==0) {
		while ($fila = mysqli_fetch_array($result)) {
			$marcas[$fila[0]] = $fila[1];
		}
	}


	echo json_encode(['producto'=>$producto,'fsubcat'=>$subCategorias,'fmarcas'=>$marcas]);
	return;
 ?>

