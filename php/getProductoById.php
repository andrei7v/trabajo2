<?php 

	header('Content-type: application/json');
	
	include 'conexion.php';

	// Recuperacion de valores
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
	echo json_encode($producto);
	return;
 ?>




 <!-- 

	header('Content-type: application/json');
	
	include 'conexion.php';

	// Recuperacion de valores
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
	echo json_encode($producto);
	return;
 -->

