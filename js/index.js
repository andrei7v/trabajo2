$(document).ready(function() {

  obtenerCards();
});


function obtenerCards() {
  $("#div-card").html("");
  //renderTemplateCards('holi', 'descipcion edesds ds', 1500, 'oster', 'php/imagenes/licuadora1.jpg');


  $.getJSON("php/obtenerCards.php", function(response) {

    //template
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      for (var i = 0; i < response.message.length; i++) {
        renderTemplateCards(response.message[i].nombre, response.message[i].descripcion, response.message[i].precio, response.message[i].marca, response.message[i].rutaimagen, response.message[i].nombret);
      };
    };
  });
}




function renderTemplateCards(nombre, descripcion, precio, marca, rutaimagen, nombret) {
  var clone = activeTemplate("#template-card");

  clone.querySelector("[data-nombre]").innerHTML = nombre;
  clone.querySelector("[data-nombre2]").innerHTML = nombret;
  clone.querySelector("[data-descripcion]").innerHTML = descripcion;
  clone.querySelector("[data-precio]").innerHTML = 'Precio: S/ ' + precio;
  clone.querySelector("[data-precio2]").innerHTML = 'Precio: S/ ' + precio;
  clone.querySelector("[data-marca]").innerHTML = 'Marca: ' + marca;
  clone.querySelector("[data-rutaimagen]").setAttribute("src", 'php/imagenes/' + rutaimagen);
  $("#div-card").append(clone);
}

//codigo de materialize
function activeTemplate(nombre) {
  var template = document.querySelector(nombre);
  return document.importNode(template.content, true);
}