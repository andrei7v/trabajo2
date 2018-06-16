<?php 

	header('Content-type: application/json');
	
	include 'conexion.php';

	// Recuperacion de valores
	$usuario = $_POST["user"];
	$pass = $_POST["password"];

	// Validaciones internas en el servidor
	$consulta = "SELECT * FROM usuario WHERE usu_usuario = '".$usuario."' AND usu_password = '".md5($pass)."'";

	$res = mysqli_query($conn, $consulta);

	if ($usuario=="") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el nombre del usuario.']);
		return;
	}
	if ($pass=="") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la contraseña del usuario.']);
		return;
	}
	if (strlen($pass) < 4 ){
		echo json_encode(['error' => true, 'message' => 'La contraseña debe tener más de 4 caracteres.']);
		return;
	}
	if ( mysqli_num_rows($res) <= 0) {
		echo json_encode(['error' => true, 'message' => 'No existe un usuario con estas credenciales.']);
		return;
	} else {
		if ($fila = mysqli_fetch_array($res)) {

	            session_start();  
	            // Almacenamos el nombre de usuario en una variable de sesión usuario
	            $_SESSION['id'] = $fila["usu_id"];
	            $_SESSION['name'] = $fila["usu_name"];
	            $_SESSION['role'] = $fila["usu_role"];
	            $_SESSION['usuario'] = $fila["usu_usuario"];
	            $_SESSION['password'] = $fila["usu_password"];
				echo json_encode(['error' => false,
								 'message' => 'Bienvenido al sistema. Redireccionando...',
								 'role' => $fila["usu_role"] ]);
	            return;
		}
	}

 ?>