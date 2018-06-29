$(document).ready(function() {

  paginacion(1);
});

function paginacion(pagina) {
  var url = "php/paginarCards.php";
  $.ajax({
    url: url,
    type: 'POST',
    data: 'pagina=' + pagina,
    success: function(response) {
      var array = eval(response);
      $("#div-card").html(array[0]);
      $("#paginacion").html(array[1]);
    }
  });
  return false
}