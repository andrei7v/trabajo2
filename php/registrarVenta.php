<?php
	header("Content-type: application/json");
  include 'conexion.php';
  date_default_timezone_set('America/Lima');

  session_start();

  $idAlumno = $_SESSION['id'];

 	$productos  =$_POST['productos'];
	// $precios  =$_POST['precios'];
	$cantidades  =$_POST['cantidades'];

	if (sizeof($productos)==0) {
		echo json_encode(['error'=>true, 'message'=>'Seleccione minimo un curso']);
		return;
	}
	// if (sizeof($precios)==0) {
	// 	echo json_encode(['error'=>true, 'message'=>'Seleccione minimo un curso']);
	// 	return;
	// }
	if (sizeof($cantidades)==0) {
		echo json_encode(['error'=>true, 'message'=>'Seleccione minimo un curso']);
		return;
  }
  


	$conn->autocommit(false);

  
	try {

	$query = "INSERT INTO ventas(ven_usuario, ven_fecha, ven_estado)
					VALUES($idAlumno, now(), 1)";
	 	$result = mysqli_query($conn, $query);
    // Obtiene el ultimo id insertado
    $last_id = mysqli_insert_id($conn);








		$subtotalporprod = 0; //costo total x producto
		$costotal = 0;


	//	$sumac = 0;

		for ($i=0; $i < sizeof($productos); $i++) {
			$query2 = "SELECT * FROM producto WHERE prod_nombre = '$productos[$i]'";
			$result2 = mysqli_query($conn, $query2);
			$row = mysqli_fetch_array($result2);

			// $sumac += $row[3];
      $subtotalporprod = $row[4]*$cantidades[$i];
			$query3 = "INSERT INTO deta_ventas(deta_ventas, deta_producto, deta_cantidad, deta_costo, deta_subtotal, deta_estado)
						VALUES($last_id, $row[0], $cantidades[$i], $row[4], $subtotalporprod, 1)";
			$result3 = mysqli_query($conn, $query3);
			$costotal = $costotal + $subtotalporprod;
		}


		$query4 = "UPDATE ventas SET ven_costot =$costotal WHERE ven_id = $last_id";
		$result4 = mysqli_query($conn, $query4);

		// $query6 = "SELECT * FROM matricula WHERE mat_id = $last_id";
		// $result6 = mysqli_query($conn, $query6);
		// $row2 = mysqli_fetch_array($result6);
		// $eee = $row2[1];

		// $query7 = "UPDATE alumno SET alu_registrado = 1 WHERE alu_id = $eee";
		// $result7 = mysqli_query($conn, $query7);

		$conn->commit();
		echo json_encode(['error'=>false, 'message'=>'Compra registrada correctamente']);
		return;
	} catch (Exception $e) {
		$conn->rollback();
		echo json_encode(['error'=>true, 'message'=>'No se pudo registrar la compra']);
		return;
	}

?>
