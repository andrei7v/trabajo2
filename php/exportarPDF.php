<?php 
	header('Content-Type: text/html; charset=utf8');
	date_default_timezone_set('America/Lima');

	require 'fpdf/fpdf.php';
	include 'conexion.php';

	$pdf = new FPDF();
	//agregar una pagina
	$pdf->AddPage();

	$pdf->SetFont('Arial', '', 10);
	$pdf->Image('imagenes/logo.jpg',10, 10, 15, 15,'JPG');
	$pdf->Cell(18, 10, "", 0);
	$pdf->Cell(140,15, 'VENTAS', 0);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50, 15, 'Fecha: '.date("d-m-Y"), 0);

	$pdf->Ln(15);

	$pdf->SetFont('Times', 'B', 14);
	$pdf->Cell(190, 14, 'VENTAS', 0, 0, 'C');

	//crear saltos de linea
	$pdf->Ln(15);

	// $pdf->SetFont('Courier', 'B', 10);
	// $pdf->Cell(7, 8, 'ID', 1, 0, 'C');
	// $pdf->Cell(55, 8, 'NOMBRE', 1, 0, 'C');
	// $pdf->Cell(40, 8, 'DURACION (min)', 1, 0, 'C');
	// $pdf->Cell(30, 8, utf8_decode('AÑO ESTRENO'), 1, 0, 'C');
	// $pdf->Cell(25, 8, 'CATEGORIA', 1, 0, 'C');
	// $pdf->Cell(30, 8, 'IMAGEN', 1, 0, 'C');

	// $pdf->SetFont('Arial', '', 9);
	// $pdf->Ln(8);

	// crear la consulta de los datos
	// $consulta = "SELECT p.pel_id, p.pel_nombre, p.pel_duracion, p.pel_anio,
	// 					c.cat_name, p.pel_imagen
	// 			 FROM pelicula p
	// 			 INNER JOIN categoria c
	// 			 ON p.pel_categoria = c.cat_id";
	// $resultado = mysqli_query($conn, $consulta);
	// while($fila = mysqli_fetch_array($resultado)){
	// 	$pdf->Cell(7, 8, $fila[0], 1);
	// 	$pdf->Cell(55, 8, $fila[1], 1);
	// 	$pdf->Cell(40, 8, $fila[2], 1);
	// 	$pdf->Cell(30, 8, $fila[3], 1);
	// 	$pdf->Cell(25, 8, $fila[4], 1);
	// 	$pdf->Cell(30, 8, $fila[5], 1);
	// 	$pdf->Ln(8);
	// }


//crear consulta

$consulta = "SELECT  v.ven_id, u.usu_name, u.usu_direccion, v.ven_fecha, v.ven_costot
						FROM ventas v
						INNER JOIN usuario u
						ON v.ven_usuario = u.usu_id
						ORDER BY v.ven_id ASC";

$resultado = mysqli_query($conn, $consulta);
while($fila = mysqli_fetch_array($resultado)){
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(30, 10,'Venta: 0'.$fila[0], 0);
		$pdf->Ln(10);
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(50, 8, 'Cliente: '.$fila[1], 0);
		$pdf->Cell(75, 8, 'Direccion: '.$fila[2], 0);
		$pdf->Cell(70, 8, 'Fecha de Compra: '.$fila[3], 0);
		$pdf->Ln(8);

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(10, 8, 'ID', 1, 0, 'C');
		$pdf->Cell(90, 8, 'NOMBRE DE PRODUCTO', 1, 0, 'C');
		$pdf->Cell(20, 8, 'CANTIDAD', 1, 0, 'C');
		$pdf->Cell(30, 8, 'PRECIO S/', 1, 0, 'C');
		$pdf->Cell(30, 8, 'SUBTOTAL S/', 1, 0, 'C');
		$pdf->Ln(8);

		$consulta2 = "SELECT d.prod_id, p.prod_nombre, d.deta_cantidad, d.deta_costo, d.deta_subtotal
									FROM deta_ventas d 
									INNER JOIN ventas v 
									ON d.deta_ventas = v.ven_id 
									INNER JOIN producto p 
									ON d.deta_producto = p.prod_id 
									WHERE v.ven_id = $fila[0]
									ORDER BY d.prod_id ASC";
		$resultado2 = mysqli_query($conn, $consulta2);

	$numeracion=1;

	while($fila2 = mysqli_fetch_array($resultado2)){
		

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(10, 8, $numeracion, 1, 0, 'C');
		$pdf->Cell(90	, 8, $fila2[1], 1);
		$pdf->Cell(20, 8, $fila2[2], 1, 0, 'C');
		$pdf->Cell(30, 8, $fila2[3], 1, 0, 'C');
		$pdf->Cell(30, 8, $fila2[4], 1, 0, 'C');
		$pdf->Ln(8);
		$numeracion++;
	}

		$pdf->Cell(150, 8, 'TOTAL S/', 1, 0, 'C');
		$pdf->Cell(30, 8, $fila[4], 1, 0, 'C');
		$pdf->Ln(8);


}



	//crear archivo de salida
	$pdf->Output("reportePDF.pdf", "I"); 
?>