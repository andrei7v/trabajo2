<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.css">
  <link rel="stylesheet" href="css/navbar.css">
  <title>Inicio | Proyecto</title>
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
  

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Productos</h1>
      <div class="row center">
        <h5 class="header col s12 light">Compra online. Encuentra lo último en laptops, televisores, electrodomésticos y más. </h5>
      </div>
    </div>
  </div>

<div class="container">
   <div class="row" id="div-card">
   </div>
</div>
<div class="row center-align">
  <ul class="pagination" id="paginacion">
  
  </ul>
</div>


  <footer class="page-footer blue darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      <p class="orange-text text-lighten-3">Made by Andrei</p>
      </div>
    </div>
  </footer>



  <div id="modal1" class="modal">
      <form id="formLogin" class="col s12">
          <div class="modal-content">
              <h4>Iniciar Sesión</h4>
              <div class="row">
                <div class="input-field col s6">
                  <input id="user" name="user" type="text" class="validate">
                  <label for="user">Ingrese usuario</label>
                </div>
                <div class="input-field col s6">
                  <input id="password" name="password" type="password" class="validate">
                  <label for="password">Ingrese contraseña</label>
                </div>
              </div>
          </div>
          <div class="modal-footer">
              <a id="login" data-url="panel.php" class="modal-action waves-effect waves-green btn-flat">Ingresar</a>
              <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
          </div>
      </form>
  </div>

  <div id="modal2" class="modal">
      <form id="formRegister" class="col s12">
          <div class="modal-content">
              <h4>Registro de usuario</h4>
              <div class="row">
                <div class="input-field col s6">
                  <input id="user" name="user" type="text" class="validate">
                  <label for="user">Usuario</label>
                </div>
                <div class="input-field col s6">
                  <input id="name" name="name" type="text" class="validate">
                  <label for="name">Nombre y apellidos </label>
                </div>
                <div class="input-field col s6">
                  <input id="password" name="password" type="password" class="validate">
                  <label for="password">Contraseña</label>
                </div>
                <div class="input-field col s6">
                  <input id="pass" name="pass" type="password" class="validate">
                  <label for="pass">Repetir contraseña</label>
                </div>
                <div class="input-field col s6">
                  <input id="telefono" name="telefono" type="text" class="validate">
                  <label for="telefono">Teléfono</label>
                </div>
                <div class="input-field col s6">
                  <input id="direccion" name="direccion" type="text" class="validate">
                  <label for="direccion">Dirección</label>
                </div>
              </div>
          </div>
          <div class="modal-footer">
              <a id="register" class="modal-action waves-effect waves-green btn-flat">Registrar</a>
              <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
          </div>
      </form>
  </div>

  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/btnnavbar.js"></script>
  <script src="js/index.js"></script>
</body>

</html>