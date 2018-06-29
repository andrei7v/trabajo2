<?php 
include_once 'conexion.php';
	$paginaActual = $_POST["pagina"];

	$query = "SELECT * FROM ventas";
	$result = mysqli_query($conn, $query);

  $numeroVentas = mysqli_num_rows($result);

  $numeroLotes = 3;
  
	$numeroPaginas = ceil($numeroVentas/$numeroLotes);

	$lista = '';
	$tabla = '';

	if ($paginaActual == 1) {
		$lista = $lista.'<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';
	} else {
		$lista = $lista.'<li class=""><a href="javascript:paginacion('.($paginaActual-1).');"><i class="material-icons">chevron_left</i></a></li>';
	}


	for ($i=1; $i <=$numeroPaginas; $i++) { 
		if ($i == $paginaActual) {

			$lista = $lista.'<li class="active"><a href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
		} else {

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
  
	$consulta = "SELECT v.ven_id, v.ven_fecha, v.ven_costot, u.usu_name
			  FROM ventas v
        INNER JOIN usuario u
        ON v.ven_usuario = u.usu_id
				ORDER BY v.ven_id DESC
        LIMIT $limit, $numeroLotes
			  ";

	$resultado = mysqli_query($conn, $consulta);

    while ($fila = mysqli_fetch_array($resultado)) {
    	$tabla = $tabla.'<tr>
                  <td data-idventa>'.$fila[0].'</td>
                  <td data-usuario class="center-align">'.$fila[3].'</td>
                  <td data-costot class="center-align">'.$fila[2].'</td>
                  <td data-fecha class="center-align">'.$fila[1].'</td>
                </tr>';
    }

    $array = array(0 => $tabla, 1 => $lista );

    echo json_encode($array);?>