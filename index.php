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








<!-- MODIFICAR AQUI -->
<div class="container">
   <div class="row" id="div-card">
   </div>
</div>
<div class="row center-align">
  <ul class="pagination" id="paginacion">
  
  </ul>
</div>


<!-- template de cards -->
<!-- <template id="template-card">
  <div class="card col s12 m6">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" data-rutaimagen>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4" data-nombre><i class="material-icons right">more_vert</i></span>
      <p data-precio></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4" data-nombre2><i class="material-icons right">close</i>Card Title4</span>
      <p data-descripcion></p>
      <p data-marca></p>
      <p data-precio2></p>
    </div>
  </div>
</template> -->

  <!-- <div class="card col s12 m6 l4">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="php/imagenes/licuadora1.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Card Title2<i class="material-icons right">more_vert</i></span>
      <p>Precio</p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Card Title4</span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
      <p>Marca:</p>
      <p>Precio:</p>
    </div>
  </div>

 -->

















  <!-- <div class="container">
    <div class="section">

      <di v class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div> -->

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


  <!--  Modales-->
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