$(document).ready(function() {
  $('.modal').modal();

  permisos();
  obtenerTodosProductosEl();
  agregarLista();

  $modalCompras = $("#modalCompras");
  $("#btn-registrar").on("click", mostrarModalCompras);

  $('#cboProductos').change(obtenerPrecio);

  $("#formCompras").on('submit', registrarVenta);

});

function permisos() {
  $.getJSON("php/permisos.php", function(response) {
    if (response.permisos == 1) {
      obtenerventas();
    } else {
      window.location = 'index.php';
      return;
    }
  });
}

function mostrarModalCompras() {
  $("select").material_select();
  $modalCompras.modal('open');
}

function obtenerTodosProductosEl() {
  $.getJSON("php/obtenerTodosProductos.php", function(response) {
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {

      for (var i = 0; i < response.message.length; i++) {
        $("#cboProductos").append($("<option></option>").attr("value", response.message[i].idproducto).text(response.message[i].nombrep));

      };
      $("#cboProductos").val(0);
    };
  });
}

function obtenerPrecio() {
  var idProducto = $("#cboProductos").val();
  $.post("php/obtenerPrecio.php", { idProducto: idProducto }, function(response) {

    $modalCompras.find("[id=precio]").val(response.message[0].precio);
    Materialize.updateTextFields();

  });
}



function registrarVenta(event) {
  event.preventDefault();
  var url = "php/registrarVenta.php";
  var data = $(this).serializeArray();
  $.ajax({
      url: url,
      data: data,
      method: 'POST'
    })
    .done(function(response) {
      if (response.error) {
        Materialize.toast(response.message, 3000, 'rounded');
      } else {
        Materialize.toast(response.message, 3000, 'rounded');
        $("#cboProductos").val(0);
        $("#precio").val("");
        $("#cantidad").val("");
        $modalCompras.modal('close');
        Materialize.updateTextFields();
        $('#cboProductos').material_select();
        $("tbody").html('<tr class="fila-base"><td><input type="text" readonly=""></td><td><input type="text" readonly="" class="center-align"></td><td><input type="text" readonly="" class="center-align"></td><td class="eliminar btn red">X</td></tr>');
        obtenerventas();
      };
    });
}







function agregarLista() {
  var opcionAgregada = "";
  var opcionActual = "";
  var hay = 0;
  var precio = "";
  var cantidad = "";
  $("#agregar").on("click", function() {
    opcionActual = $("#cboProductos option:selected").text();
    precio = $("#precio").val();
    cantidad = $("#cantidad").val();

    $("#tabla tbody tr").each(function() {
      opcionAgregada = $(this).children().children().val();
      if (opcionActual == opcionAgregada || precio == "" || cantidad == "") {
        hay = 1;
      };
    });
    if (!hay) {
      $("#tabla tbody tr:eq(0) td:first-child").children().attr("name", "productos[]").val(opcionActual);
      $("#tabla tbody tr:eq(0) td:nth-child(2)").children().attr("name", "precios[]").val(precio);
      $("#tabla tbody tr:eq(0) td:nth-child(3)").children().attr("name", "cantidades[]").val(cantidad);

      $("#tabla tbody tr:eq(0)").clone().removeClass("fila-base").appendTo("#tabla tbody");
      $("#tabla tbody tr:eq(0)").children().children().removeAttr("name").val("");
    } else {
      Materialize.toast("Complete los campos correctamente", 3000, 'rounded');
    };
    hay = 0;
    $("#cboProductos").val(0);
    $("#precio").val("");
    $("#cantidad").val("");
    Materialize.updateTextFields();
    $('#cboProductos').material_select();
  });

  $(document).on("click", ".eliminar", function() {
    var parent = $(this).parents().get(0);
    $(parent).remove();
    opcionActual = "";
    opcionAgregada = "";
    hay = 0;
  })

}

var $modalCompras;

function obtenerventas() {
  $("#table-venta").html("");

  $.getJSON("php/obtenerVentasporId.php", function(response) {

    //template
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      for (var i = 0; i < response.message.length; i++) {
        renderTemplateVentas(response.message[i].idventa, response.message[i].fecha, response.message[i].costot);
      };
    };
  });
}

function renderTemplateVentas(id, fecha, costot) {
  var clone = activeTemplate("#template-venta");

  clone.querySelector("[data-idventa]").innerHTML = id;
  clone.querySelector("[data-fecha]").innerHTML = fecha;
  clone.querySelector("[data-costot]").innerHTML = costot;
  $("#table-venta").append(clone);
}

function activeTemplate(id) {
  var template = document.querySelector(id);
  return document.importNode(template.content, true);
}