<?php 
    header('content-type: application/json');
	include 'conexion.php';

	session_start();
	if (!isset($_SESSION['id'])) { //sin logear
		$permisos = 0;
	} else if ($_SESSION['role'] == 2) { //login admin
		$permisos = 2;
   } else {  //login usuario
		$permisos = 1;
    }

    	echo json_encode([ 'permisos'=>$permisos]);
	return;

?>

