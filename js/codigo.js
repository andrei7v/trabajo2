$(document).ready(function() {
  // sidenav
  $(".button-collapse").sideNav(); //codigo materialize modal
  //barra
  mostrarBotonesNavbar();

  //login register
  $('.modal').modal(); //codigo materialize modal
  $('select').material_select(); //codigo materialize form

  $modalLogin = $('#modal1'); //modal del login
  $modalRegister = $('#modal2'); //modal del register

  $(document).on('click', '[data-login]', showLogin); //mostrar modal de login mejorado
  //$('#btn-login').on('click', showLogin); //mostrar modal de login
  $('#login').on('click', loginUser); // valida login
  $(document).on('click', '[data-register]', showLogin); //mostrar modal de registro mejorado
  //    $('#btn-register').on('click', showRegister); //mostral modal de registro
  $('#register').on('click', registerUser); //valida registro

});

var $modalLogin; //creado para login
var $modalRegister; //creado para login


function mostrarBotonesNavbar() {
  $(".hide-on-med-and-down").html('');
  $.getJSON("php/mostrarBotonesNavbar.php", function(response) {
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      $(".hide-on-med-and-down").html(response.message);
      $(".side-nav").html(response.message);
    };
  });
}

//////////////////////////////////////////////////////// login y register

//mostrar modal login
function showLogin() {
  $modalLogin.modal('open');
  Materialize.updateTextFields();
}

//validar register
function registerUser() {
  event.preventDefault();
  var url = 'php/registrarUsuario.php';
  var data = $("#formRegister").serializeArray();
  $.ajax({
      url: url,
      data: data,
      method: 'POST'
    })
    .done(function(response) {
      console.log(response);
      if (response.error) {
        console.log(response.message);
        Materialize.toast(response.message, 4000)
      } else {
        Materialize.toast(response.message, 4000)
        location.reload();

      }

    });
}

//valida login
function loginUser() {
  event.preventDefault();
  var url = 'php/validarUsuario.php';
  var data = $("#formLogin").serializeArray();
  $.ajax({
      url: url,
      data: data,
      method: 'POST'
    })
    .done(function(response) {
      console.log(response);
      if (response.error) {
        console.log(response.message);
        Materialize.toast(response.message, 4000)
      } else {
        Materialize.toast(response.message, 4000)
        if (response.role == "1") {
          window.location = 'panel.php';
        } else {
          window.location = 'panel2.php';
        }
      }
    });
}

//mostrar register
function showRegister() {
  $modalRegister.modal('open');
  Materialize.updateTextFields();
}