<?php 
	if (!empty($_GET["imagen"]) || $_GET["imagen"] != null) {
		$imagen = basename($_GET["imagen"]);
		$ruta = "imagenes/".$imagen;
		if (!empty($imagen) && file_exists($ruta)) {
			header("Cache-control: public");
			header("Content-Description: File Transfer");
			header('Content-Disposition: attachment; filename="'.$imagen.'"');
			header("Conten-type: image/jpeg");
			header("Content-Transfer-Encoding: binary");

			readfile($ruta);
			exit();
		} else {
			header("Location: ../peliculas.php");
		}
		
	}
?>