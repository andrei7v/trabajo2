<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.css">
  <link rel="stylesheet" href="css/navbar.css">
  <title>Ventas</title>
</head>

<body>
  <nav class="blue darken-2" role="navigation">
    <div class="nav-wrapper container-fluid">
      <a href="index.php" class="brand-logo" id="logo">Sistema Ventas</a>    
      <ul class="right hide-on-med-and-down" id="barra"></ul>
      <ul id="nav-mobile" class="side-nav"></ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <div class="row">
    <div class="col s12 m6 offset-m3">
      <br>
      <a href="php/exportarPDF.php" target="_blank" class="btn-floating btn-large waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Exportar PDF"><i class="material-icons">picture_as_pdf</i></a>
    </div>
  </div>

<h2 class="center-align">Registro de Ventas</h2>
  <div class="row">
    <div class="col s12 m6 offset-m3">
      <table class="striped">
        <thead>
          <tr>
            <th>Id</th>
            <th class="center-align">Usuario</th>
            <th class="center-align">Costo Total(S/)</th>
            <th class="center-align">Fecha</th>
          </tr>
        </thead>
        <tbody id="table-venta">
        
        </tbody>
      </table>
    </div>
  </div>

  <div class="row center-align">
    <ul class="pagination" id="paginacion">
    
    </ul>
  </div>

  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/btnnavbar.js"></script>
  <script src="js/ventas.js"></script>

</body>

</html>
