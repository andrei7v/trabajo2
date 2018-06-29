$(document).ready(function() {
  $('.modal').modal();
  permisos();

});

function permisos() {
  $.getJSON("php/permisos.php", function(response) {
    if (response.permisos == 2) {
      paginacion(1);
    } else {
      window.location = 'index.php';
      return;
    }
  });
}

function paginacion(pagina) {
  var url = "php/paginarVentas.php";
  $.ajax({
    url: url,
    type: 'POST',
    data: 'pagina=' + pagina,
    success: function(response) {
      var array = eval(response);
      $("#table-venta").html(array[0]);
      $("#paginacion").html(array[1]);
    }
  });
  return false
}