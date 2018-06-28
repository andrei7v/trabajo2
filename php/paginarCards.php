<?php 
include_once 'conexion.php';
	$paginaActual = $_POST["pagina"];

	$query = "SELECT * FROM producto WHERE prod_estado = 1 AND prod_stock > 1";
	$result = mysqli_query($conn, $query);

  //total ventas
  $numeroProductos = mysqli_num_rows($result);

  //cada cuanto?
  $numeroLotes = 2;
  
  //cuantas paginas mostrare
	$numeroPaginas = ceil($numeroProductos/$numeroLotes);

	$lista = '';
	$tabla = '';

  //de la <-
	if ($paginaActual == 1) {
		$lista = $lista.'<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';
	} else {
		$lista = $lista.'<li class=""><a href="javascript:paginacion('.($paginaActual-1).');"><i class="material-icons">chevron_left</i></a></li>';
	}


  //llenar los numeros
	for ($i=1; $i <=$numeroPaginas; $i++) { 
		if ($i == $paginaActual) {
			# active
			$lista = $lista.'<li class="active"><a href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
		} else {
			# waves-effect
			$lista = $lista.'<li class="waves-effect"><a href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
		}
  }
  

	if ($paginaActual < $numeroPaginas){
		$lista = $lista.'<li class="waves-effect"><a href="javascript:paginacion('.($paginaActual+1).');"><i class="material-icons">chevron_right</i></a></li>';
	} else {
		$lista = $lista.'<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>';
  }
  

	if ($paginaActual <= 1) {
		$limit = 0;
	} else {
		$limit = $numeroLotes*($paginaActual-1);
  }
  




	$consulta = "SELECT LEFT(p.prod_nombre, 29), p.prod_descripcion, p.prod_precio,
                  m.mar_name, p.prod_imagen, p.prod_nombre
    			  FROM producto p
            INNER JOIN marca m
			      ON p.prod_marca = m.mar_id
            WHERE p.prod_estado = 1 AND p.prod_stock > 1
            LIMIT $limit, $numeroLotes
			  ";

	$resultado = mysqli_query($conn, $consulta);

    while ($fila = mysqli_fetch_array($resultado)) {
    	$tabla = $tabla.'  <div class="card col s12 m6">
                          <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" data-rutaimagen src="php/imagenes/'.$fila[4].'">
                          </div>
                          <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4" data-nombre><i class="material-icons right">more_vert</i>'.$fila[0].'</span>
                            <p data-precio>Precio: S/ '.$fila[2].'</p>
                          </div>
                          <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4" data-nombre2><i class="material-icons right">close</i>'.$fila[5].'</span>
                            <p data-descripcion>'.$fila[1].'</p>
                            <p data-marca>Marca: '.$fila[3].'</p>
                            <p data-precio2>Precio: S/ '.$fila[2].'</p>
                          </div>
                        </div>';
    }

    $array = array(0 => $tabla, 1 => $lista );

    echo json_encode($array);?>