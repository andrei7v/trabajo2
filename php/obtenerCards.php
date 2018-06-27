<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$query = "SELECT LEFT(p.prod_nombre, 29), p.prod_descripcion, p.prod_precio,
                  m.mar_name, p.prod_imagen, p.prod_nombre
    			  FROM producto p
            INNER JOIN marca m
			      ON p.prod_marca = m.mar_id
            WHERE p.prod_estado = 1 AND p.prod_stock > 1
            ";
            

            
	$result = mysqli_query($conn, $query);

	$cards = [];

	if (mysqli_num_rows($result)==0) {
		$msg = "No hay productos disponibles";
		echo json_encode(['error'=>false, 'message'=>$msg]);
		return;
	} else {
		while ($fila = mysqli_fetch_array($result)) {
			$cards[] = array('nombre' => $fila[0], 'descripcion' => $fila[1], 'precio' => $fila[2],'marca' => $fila[3],'rutaimagen' => $fila[4],'nombret' => $fila[5]);
		}
	}

	echo json_encode(['error'=>false, 'message'=>$cards]);
	return;

?>

<!-- eliminar -->

