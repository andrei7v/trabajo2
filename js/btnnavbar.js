$(document).ready(function() {
  $(".button-collapse").sideNav();
  mostrarBotonesNavbar();

  $('.modal').modal();
  $('select').material_select();

  $modalLogin = $('#modal1');
  $modalRegister = $('#modal2');

  $(document).on('click', '[data-login]', showLogin);
  $(document).on('click', '[data-register]', showRegister);

  $('#login').on('click', loginUser);
  $('#register').on('click', registerUser);

});

var $modalLogin;
var $modalRegister;

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

function showLogin() {
  $modalLogin.modal('open');
  Materialize.updateTextFields();
}

function showRegister() {
  $modalRegister.modal('open');
  Materialize.updateTextFields();
}

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
      if (response.error) {
        Materialize.toast(response.message, 4000)
      } else {
        Materialize.toast(response.message, 4000),
          $modalLogin.modal('close'),
          mostrarBotonesNavbar(response.role);

      }
    });
}

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
      if (response.error) {
        Materialize.toast(response.message, 4000)
      } else {
        Materialize.toast(response.message, 4000)
        $modalRegister.modal('close'),
          mostrarBotonesNavbar(response.role);

      }

    });
}