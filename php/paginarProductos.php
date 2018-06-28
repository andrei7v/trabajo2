<?php 
include_once 'conexion.php';
	$paginaActual = $_POST["pagina"];

	$query = "SELECT * FROM producto";
	$result = mysqli_query($conn, $query);

  //total ventas
  $numeroProductos = mysqli_num_rows($result);

  //cada cuanto?
  $numeroLotes = 3;
  
  //cuantas paginas mostrare
	$numeroPaginas = ceil($numeroProductos/$numeroLotes);

	$lista = '';
  $tabla = '';
  $colorStock = '';

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
  




	$consulta = "SELECT p.prod_id, p.prod_nombre, m.mar_name, LEFT(p.prod_descripcion, 50), p.prod_precio, p.prod_stock,
			  p.prod_imagen, s.sub_name,c.cat_name
			  FROM producto p
              INNER JOIN marca m
			  ON p.prod_marca = m.mar_id
			  INNER JOIN subcategoria s
			  ON m.mar_subcategoria = s.sub_id
			  INNER JOIN categoria c
			  ON s.sub_categoria = c.cat_id
			  WHERE p.prod_estado = 1
        ORDER BY p.prod_id ASC
        LIMIT $limit, $numeroLotes
			  ";

	$resultado = mysqli_query($conn, $consulta);

    while ($fila = mysqli_fetch_array($resultado)) {

     


      if ($fila[5] == 0) {
        $colorStock ='<td data-idproducto class="red-text">'.$fila[0].'</td>
              <td data-nombre class="red-text">'.$fila[1].'</td>
              <td data-marca class="red-text">'.$fila[2].'</td>
              <td data-descripcion class="red-text">'.$fila[3].'...</td>
              <td data-precio class="red-text">'.$fila[4].'</td>
              <td data-stock class="red-text">'.$fila[5].'</td>
              <td data-subcategoria class="red-text">'.$fila[7].'</td>
              <td data-categoria class="red-text">'.$fila[8].'</td>';
      } else {
        $colorStock ='<td data-idproducto>'.$fila[0].'</td>
                <td data-nombre>'.$fila[1].'</td>
                <td data-marca>'.$fila[2].'</td>
                <td data-descripcion>'.$fila[3].'...</td>
                <td data-precio>'.$fila[4].'</td>
                <td data-stock>'.$fila[5].'</td>
                <td data-subcategoria>'.$fila[7].'</td>
                <td data-categoria>'.$fila[8].'</td>';
      }

      $tabla = $tabla.'<tr>'.$colorStock.'<td>
                          <a data-edit='.$fila[0].' class="waves-effect waves-light btn"> 
                            <i class="large material-icons">edit</i>
                          </a>
                          <a data-image='.$fila[0].' class="waves-effect waves-light btn"> 
                            <i class="large material-icons">image</i>
                          </a>
                          <a data-download class="waves-effect waves-light btn" href="php/descargarArchivo.php?imagen='.$fila[6].'"> 
                            <i class="large material-icons">cloud_download</i>
                          </a>
                          <a data-delete='.$fila[0].' data-nombred='.$fila[1].' class="waves-effect waves-light btn"> 
                            <i class="large material-icons">delete</i>
                          </a>
                        </td>
                      </tr>';
    }

    $array = array(0 => $tabla, 1 => $lista );

    echo json_encode($array);?>