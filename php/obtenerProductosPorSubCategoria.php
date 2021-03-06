<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$id = $_POST["idSubCategoria"];

	$query = "SELECT p.prod_id, p.prod_nombre, m.mar_name, LEFT(p.prod_descripcion, 50), p.prod_precio, p.prod_stock,
			  p.prod_imagen, s.sub_name,c.cat_name
			  FROM producto p
              INNER JOIN marca m
			  ON p.prod_marca = m.mar_id
			  INNER JOIN subcategoria s
			  ON m.mar_subcategoria = s.sub_id
			  INNER JOIN categoria c
			  ON s.sub_categoria = c.cat_id
			  WHERE m.mar_subcategoria = $id AND p.prod_estado = 1
			  ORDER BY p.prod_id ASC";
	$result = mysqli_query($conn, $query);

	$productos = [];

	if (mysqli_num_rows($result)==0) {
		$msg = "No hay productos disponibles";
		echo json_encode(['error'=>true, 'message'=>$msg]);
		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$productos[] = array('idproducto' => $fila[0], 'nombre' => $fila[1], 'marca' => $fila[2], 'descripcion' => $fila[3], 'precio' => $fila[4], 'stock' => $fila[5], 'imagen' => $fila[6], 'subcategoria' => $fila[7], 'categoria' => $fila[8]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$productos]);
	return;

?>
