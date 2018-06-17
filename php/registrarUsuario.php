<?php 
	header('content-type: application/json');
	include 'conexion.php';

	$name = $_POST['name'];
	$usuario = $_POST['user'];
	$password = $_POST['password'];
	$repeatPass = $_POST['pass'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];

	// Validar que los inputs no esten vacios
	if ($usuario == "") {
		echo json_encode(['error'=>true, 'message'=>'Es necesario ingresar el usuario']);
		return;
	}

	if ($name == "") {
		echo json_encode(['error'=>true, 'message'=>'Es necesario ingresar el email']);
		return;
	}
	if ($password == "") {
		echo json_encode(['error'=>true, 'message'=>'Es necesario ingresar el password']);
		return;
	}
	if ($repeatPass == "") {
		echo json_encode(['error'=>true, 'message'=>'Es necesario ingresar el repeatPass']);
		return;
	}

	if (strlen($password) < 4) {
		echo json_encode(['error'=>true, 'message'=>'Password muy corta']);
		return;
	}

	if (strlen($repeatPass) < 4) {
		echo json_encode(['error'=>true, 'message'=>'La segunda contraseña es muy corta']);
		return;
	}

	if ($password != $repeatPass) {
		echo json_encode(['error'=>true, 'message'=>'Las contraseñas no coinciden']);
		return;
	}

	$queryV = "SELECT * FROM usuario WHERE usu_usuario = '$usuario'";
	$resultV = mysqli_query($conn, $queryV);
	if (mysqli_num_rows($resultV)>0) {
		echo json_encode(['error'=>true, 'message'=>'Este usuario ya esta siendo utilizado']);
		return;
	}

	$query = "INSERT INTO usuario(usu_name, usu_role, usu_usuario, usu_password, usu_telefono, usu_direccion, usu_estado) 
			 VALUES('$name', 1, '$usuario', '".md5($password)."', '$telefono','$direccion', 1)";
	$result = mysqli_query($conn, $query);

	if ($result) {
		echo json_encode(['error'=>false,
						'message'=>'Usuario registrado correctamente',
						'role' => $password ]);
		return;
	}
?>

