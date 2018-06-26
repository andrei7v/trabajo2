// Normalmente se inicia con esta sentencia
$(document).ready(function() {
  // Cuerpo principal
  $('.modal').modal();

  permisos();
});



function permisos() {
  $.getJSON("php/permisos.php", function(response) {
    //1-user - 2-admin
    if (response.permisos == 2) {
      obtenerventas();
    } else {
      window.location = 'index.php';
      return;
    }
  });
}




//al cargar la web 
function obtenerventas() {
  $("#table-venta").html("");

  $.getJSON("php/obtenerVentas.php", function(response) {

    //template
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      for (var i = 0; i < response.message.length; i++) {
        renderTemplateVentas(response.message[i].idventa, response.message[i].fecha, response.message[i].costot, response.message[i].nombreusu);
      };
    };
  });
}



function renderTemplateVentas(id, fecha, costot, usuario) {
  var clone = activeTemplate("#template-venta");

  clone.querySelector("[data-idventa]").innerHTML = id;
  clone.querySelector("[data-fecha]").innerHTML = fecha;
  clone.querySelector("[data-costot]").innerHTML = costot;
  clone.querySelector("[data-usuario]").innerHTML = usuario;
  $("#table-venta").append(clone);
}



//codigo de materialize
function activeTemplate(id) {
  var template = document.querySelector(id);
  return document.importNode(template.content, true);
}