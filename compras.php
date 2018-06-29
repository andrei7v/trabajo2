<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/compras.css">
  <title>Compras</title>
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
    <div class="col s11 offset-s1">
      <br>
      <a id="btn-registrar" class="btn-floating btn-large waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Registrar una compra"><i class="material-icons">add</i></a>
      <div id="div-botones"></div>
    </div>
  </div>

  <template id="template-venta">
    <tr>
      <td data-idventa></td>
      <td data-costot class="center-align"></td>
      <td data-fecha class="center-align"></td>
    </tr>
  </template>


  <div class="row">
    <div class="col s4 offset-s4">
      <table class="striped responsive-table">
        <thead>
          <tr>
            <th>Id</th>
            <th class="center-align">Costo Total(S/)</th>
            <th class="center-align">Fecha</th>
          </tr>
        </thead>
        <tbody id="table-venta">
        </tbody>
      </table>
    </div>
  </div>

  <div id="modalCompras" class="modal">
    <form class="col s12" id="formCompras">
        <div class="modal-content">
            <h4>Registrar Compra</h4>

            <div class="row">
                <div class="input-field col s12">
                    <select id="cboProductos" name="cboProductos">
                    <option value="0" disabled selected>Seleccione Producto</option>      
                    </select>
                    <label>Producto</label>
                </div>
                <div class="input-field col s5">
                    <input id="precio" name="precio" type="text" class="validate" readonly>
                    <label for="precio">Precio</label>
                </div>
                <div class="input-field col s5">
                    <input id="cantidad" name="cantidad" type="text" class="validate">
                    <label for="cantidad">Cantidad</label>
                </div>
                <div class="input-field col s2">
                    <a class="waves-effect waves-light btn" id="agregar">Agregar</a>
                </div>
            </div>
            <div class="row">
                <div class="col s10 offset-s1">
                    <table id="tabla" class="striped responsive-table centered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="fila-base">
                                <td>
                                    <input type="text" readonly="">
                                </td>
                                <td>
                                    <input type="text" readonly="" class="center-align">
                                </td>
                                <td>
                                    <input type="text" readonly="" class="center-align">
                                </td>
                                <td class="eliminar btn red">X</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="waves-effect waves-green btn-flat">Guardar</button>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
        </div>
    </form>
  </div>


  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/btnnavbar.js"></script>
  <script src="js/compras.js"></script>

</body>

</html>
