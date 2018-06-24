// Normalmente se inicia con esta sentencia
$(document).ready(function() {
  // Cuerpo principal
  $('.modal').modal();

  permisos();
  obtenerCategoriasF();
  $(document).on('click', '[data-button]', obtenerProductosPorSubCategoria); //mostrar producto al pulsar botones
  $("#todos").on('click', obtenerProductos); //mostrar todas las peliculas

  $formRegister = $("#formRegister");
  $formRegister.on("submit", registrarProducto);

  $modalRegister = $("#modalRegister"); //modal register
  $("#btn-registrar").on("click", mostrarModalRegistrar); //mostrar modal registrar

  $('#cboCategorias').change(obtenerSubCategoriasF);
  $('#cboCategoriasE').change(obtenerSubCategoriasEdit);
  $('#cboSubCategorias').change(obtenerMarcasF);
  $('#cboSubCategoriasE').change(obtenerMarcasEdit);

  $("#imagen").change(function() {
    $("#preview-image").hide();
    readURL(this);
  });

  $modalEliminar = $("#modalEliminar"); //ok
  $(document).on('click', '[data-delete]', mostrarModalEliminar);
  $formEliminar = $("#formEliminar");
  $formEliminar.on("submit", eliminarProducto);


  $modalEdit = $('#modalEdit');
  $(document).on('click', '[data-edit]', mostrarModalEditar);
  $formEdit = $("#formEdit");
  $formEdit.on("submit", editarProducto);


  $("#imagen-prodE").change(function() {
    $('#preview-imageE').hide();
    readURL2(this);
  });

  $modalImage = $("#modalImage");
  $(document).on("click", "[data-image]", mostrarModalImagen);



});


function mostrarModalImagen() {
  var imagen = $(this).data('image');
  $.post("php/obtenerInfoImagen.php", { imagen: imagen }, function(response) {
    $modalImage.find("[id=titulo]").html(response.message[0].nombre);
    $modalImage.find("[id=description]").html(response.message[0].descripcion);
    $modalImage.find("[id=showImage]").attr("src", "php/imagenes/" + response.message[0].imagen);
  });
  $modalImage.modal('open');
}



function registrarProducto(event) {
  event.preventDefault();
  var url = "php/registrarProducto.php";
  $.ajax({
      url: url,
      data: new FormData(this),
      processData: false,
      contentType: false,
      method: "POST"
    })
    .done(function(response) {
      if (response.error) {
        Materialize.toast(response.message, 3000, 'rounded');
      } else {
        Materialize.toast(response.message, 3000, 'rounded');
        $modalRegister.modal('close');
        obtenerProductos();

      };
    });
}

var $modalEliminar;
var $formEliminar;
var $formEdit;
var $modalImage;



function mostrarModalEditar() {
  var id = $(this).data('edit');
  $.getJSON('php/getProductoById.php?id=' + id, function(response) {
    var id = response.producto[0][0];
    var nombre = response.producto[0][1];
    var marca = response.producto[0][2];
    var descripcion = response.producto[0][3];
    var precio = response.producto[0][4];
    var stock = response.producto[0][5];
    var url = response.producto[0][6];
    var imagen = response.producto[0][7];
    var subCategoria = response.producto[0][8];
    var categoria = response.producto[0][9];

    $("#cboSubCategoriasE").html('');
    $("#cboMarcasE").html('');

    //solo para mostrar sub cat
    $("#cboSubCategoriasE").append('<option value="0">Seleccione Sub Categoria</option>');
    $.each(response.fsubcat, function(id, value) {
      $("#cboSubCategoriasE").append('<option value="' + id + '">' + value + '</option>');
    });
    $("#cboSubCategoriasE").material_select();

    //solo para mostrar marcas
    $("#cboMarcasE").append('<option value="0">Seleccione Marca</option>');
    $.each(response.fmarcas, function(id, value) {
      $("#cboMarcasE").append('<option value="' + id + '">' + value + '</option>');
    });
    $("#cboMarcasE").material_select();

    $modalEdit.find('[id=idE]').val(id);
    $modalEdit.find('[id=nombreE]').val(nombre);
    $modalEdit.find('[id=precioE]').val(precio);
    $modalEdit.find('[id=descripcionE]').val(descripcion);
    $modalEdit.find('[id=cboCategoriasE]').val(categoria);
    $modalEdit.find('[id=cboSubCategoriasE]').val(subCategoria);
    $modalEdit.find('[id=cboMarcasE]').val(marca);
    $modalEdit.find('[id=stockE]').val(stock);
    $modalEdit.find('[id=urlE]').val(url);
    $modalEdit.find('[id=imageE]').val(imagen);
    $("#preview-imageE").attr("src", "php/imagenes/" + imagen);
    $('select').material_select();
    Materialize.updateTextFields();
  });
  $modalEdit.modal('open');

}





function readURL(input) {
  if (input.files && input.files[0]) {
    var lectora = new FileReader();
    lectora.onload = function(event) {
      $("#preview-image").attr("src", event.target.result);
    }
    $("#preview-image").removeAttr("style");
    lectora.readAsDataURL(input.files[0]);
  }
}


var $modalRegister;
var $formRegister;

function permisos() {
  $.getJSON("php/permisos.php", function(response) {
    if (response.permisos == 2) {
      obtenerProductos();
    } else {
      window.location = 'index.php';
      return;
    }
  });
}


function obtenerCategoriasF() {
  //obtener categorias para el select
  $.getJSON("php/obtenerCategorias.php", function(response) {
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      for (var i = 0; i < response.message.length; i++) {
        $("#cboCategorias").append($("<option></option>").attr("value", response.message[i].idcategoria).text(response.message[i].nombre));
        $("#cboCategoriasE").append($("<option></option>").attr("value", response.message[i].idcategoria).text(response.message[i].nombre));


      };
    };
  });
}

function obtenerSubCategoriasF() {
  $("#cboSubCategorias").empty();
  var idCategoria = $("#cboCategorias").val();
  //obtener subcategorias para el select
  $.post("php/obtenerSubCategoriasF.php", { idCategoria: idCategoria }, function(response) {
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      $('#cboSubCategorias').prop('disabled', false);
      $("#cboSubCategorias").append('<option value="0">Seleccione Sub Categoria</option>');
      $.each(response.message, function(id, value) {
        $("#cboSubCategorias").append('<option value="' + id + '">' + value + '</option>');
      });
      $("#cboSubCategorias").material_select();
    };
  });
}

$(document).on('click', '[data-delete]', mostrarModalEliminar);

function obtenerSubCategoriasEdit() {
  $("#cboSubCategoriasE").empty();
  $("#cboMarcasE").attr("disabled", true);
  $("#cboMarcasE").html('<option value="0">Seleccione Marca</option>');
  $("#cboMarcasE").material_select()

  var idCategoria = $("#cboCategoriasE").val();
  //obtener subcategorias para el select
  $.post("php/obtenerSubCategoriasF.php", { idCategoria: idCategoria }, function(response) {
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      $('#cboSubCategoriasE').prop('disabled', false);
      $("#cboSubCategoriasE").append('<option value="0">Seleccione Sub Categoria</option>');
      $.each(response.message, function(id, value) {
        $("#cboSubCategoriasE").append('<option value="' + id + '">' + value + '</option>');
      });
      $("#cboSubCategoriasE").material_select();
    };
  });
}





function obtenerMarcasF() {
  $("#cboMarcas").empty();
  var idSubCategoria = $("#cboSubCategorias").val();
  //obtener marcas para el select
  $.post("php/obtenerMarcasF.php", { idSubCategoria: idSubCategoria }, function(response) {
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      $('#cboMarcas').prop('disabled', false);
      $("#cboMarcas").append('<option value="0">Seleccione Marca</option>');
      $.each(response.message, function(id, value) {
        $("#cboMarcas").append('<option value="' + id + '">' + value + '</option>');
      });
      $("#cboMarcas").material_select()
    };
  });
}


function obtenerMarcasEdit() {
  $("#cboMarcasE").empty();
  var idSubCategoria = $("#cboSubCategoriasE").val();
  //obtener marcas para el select
  $.post("php/obtenerMarcasF.php", { idSubCategoria: idSubCategoria }, function(response) {
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      $('#cboMarcasE').prop('disabled', false);
      $("#cboMarcasE").append('<option value="0">Seleccione Marca</option>');
      $.each(response.message, function(id, value) {
        $("#cboMarcasE").append('<option value="' + id + '">' + value + '</option>');
      });
      $("#cboMarcasE").material_select()
    };
  });
}






//mostar producto al pulsar botones okokoko
function obtenerProductosPorSubCategoria() {
  $("#table-productos").html("");
  ////$("#div-card").html("");                         no usado solo para cards
  var idSubCategoria = $(this).data("button");
  $.ajax({
      url: "php/obtenerProductosPorSubCategoria.php",
      data: { idSubCategoria: idSubCategoria },
      method: "POST"
    })
    .done(function(response) {
      if (response.error) {
        Materialize.toast(response.message, 3000, 'rounded');
      } else {
        for (var i = 0; i < response.message.length; i++) {
          renderTemplateProductos(response.message[i].idproducto, response.message[i].nombre, response.message[i].marca, response.message[i].descripcion, response.message[i].precio, response.message[i].stock, response.message[i].imagen, response.message[i].subcategoria, response.message[i].categoria);
        };
      };
    });
}


//al cargar la web cargar productos y botones okok
function obtenerProductos() {
  $("#table-productos").html("");
  //   $("#div-card").html("");                   no usado solo para cards
  $("#div-botones").html("");
  $.getJSON("php/obtenerProductos.php", function(response) {

    //template
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      for (var i = 0; i < response.message.length; i++) {
        renderTemplateProductos(response.message[i].idproducto, response.message[i].nombre, response.message[i].marca, response.message[i].descripcion, response.message[i].precio, response.message[i].stock, response.message[i].imagen, response.message[i].subcategoria, response.message[i].categoria);
      };
    };
  });
  $.getJSON("php/obtenerSubCategorias.php", function(response) {
    if (response.error) {
      Materialize.toast(response.message, 3000, 'rounded');
    } else {
      for (var i = 0; i < response.message.length; i++) {
        renderTemplateBoton(response.message[i].idsubcategoria, response.message[i].nombre);
      };
    };
  });
}


//////////////////////////registrar

function mostrarModalRegistrar() {
  $("select").material_select();
  $modalRegister.modal('open');
}


function mostrarModalEliminar() {
  var id = $(this).data("delete");
  $.getJSON('php/getNameProductoById.php?id=' + id, function(response) {
    console.log(response);
    var id = response[0][0];
    var nombre = response[0][1];
    $modalEliminar.find('[id=idD]').val(id);
    $modalEliminar.find('[id=nombreD]').html(nombre);
    $('select').material_select();
    Materialize.updateTextFields();
  });
  $modalEliminar.modal('open');
}


function eliminarProducto(event) {
  event.preventDefault();
  var url = 'php/eliminarProducto.php';
  data = $(this).serializeArray();
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
        obtenerProductos();
        $modalEliminar.modal('close');
      };
    });
}





function editarProducto() {
  event.preventDefault();
  var url = 'php/editarProducto.php';
  $.ajax({
    url: url,
    data: new FormData(this),
    method: 'POST',
    processData: false,
    contentType: false,
    success: function(response) {
      Materialize.toast(response.message, 3000, 'rounded');
      setTimeout(function() {
        obtenerProductos();
        $modalEdit.modal('close');
      }, 500);
    }
  });

}



















// renderizar el template productos okok
function renderTemplateProductos(id, nombre, marca, descripcion, precio, stock, imagen, subcategoria, categoria) {
  var clone = activeTemplate("#template-producto");

  clone.querySelector("[data-idproducto]").innerHTML = id;
  clone.querySelector("[data-nombre]").innerHTML = nombre;
  clone.querySelector("[data-nombred]").setAttribute("data-nombred", nombre);
  clone.querySelector("[data-marca]").innerHTML = marca;
  clone.querySelector("[data-descripcion]").innerHTML = descripcion + "...";
  clone.querySelector("[data-precio]").innerHTML = precio;
  clone.querySelector("[data-stock]").innerHTML = stock;
  clone.querySelector("[data-subcategoria]").innerHTML = subcategoria;
  clone.querySelector("[data-categoria]").innerHTML = categoria;
  if (stock == 0) {
    clone.querySelector("[data-idproducto]").setAttribute("class", "red-text");
    clone.querySelector("[data-nombre]").setAttribute("class", "red-text");
    clone.querySelector("[data-descripcion]").setAttribute("class", "red-text");
    clone.querySelector("[data-marca]").setAttribute("class", "red-text");
    clone.querySelector("[data-precio]").setAttribute("class", "red-text");
    clone.querySelector("[data-stock]").setAttribute("class", "red-text");
    clone.querySelector("[data-subcategoria]").setAttribute("class", "red-text");
    clone.querySelector("[data-categoria]").setAttribute("class", "red-text");
  }

  clone.querySelector("[data-edit]").setAttribute("data-edit", id);
  clone.querySelector("[data-delete]").setAttribute("data-delete", id);
  clone.querySelector("[data-download]").setAttribute("href", "php/descargarArchivo.php?imagen=" + imagen)
  clone.querySelector("[data-image]").setAttribute('data-image', id);
  $("#table-productos").append(clone);
}


// para los carrrdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd no utilizado
function renderTemplateCard(id, nombre, descripcion, duracion, anio, categoria) {

  var clone = activeTemplate("#template-card");
  clone.querySelector("[data-nombre]").innerHTML = nombre;
  clone.querySelector("[data-descripcion]").innerHTML = descripcion;
  clone.querySelector("[data-duracion]").innerHTML = duracion;
  clone.querySelector("[data-categoria]").innerHTML = categoria;
  clone.querySelector("[data-editar]").setAttribute("data-editar", id);
  clone.querySelector("[data-eliminar]").setAttribute("data-eliminar", id);

  $("#div-card").append(clone);
}

//renderizar los botones de subcategorias
function renderTemplateBoton(id, nombre) {

  var clone = activeTemplate("#template-button");
  clone.querySelector("[data-tooltip]").setAttribute("data-tooltip", "Sub categoria " + nombre);
  clone.querySelector("[data-button]").setAttribute("data-button", id);
  clone.querySelector("[data-nombre]").innerHTML = nombre;

  $("#div-botones").append(clone);

  $(document).ready(function() {
    $('.tooltipped').tooltip();
  });
}



//codigo de materialize
function activeTemplate(id) {
  var template = document.querySelector(id);
  return document.importNode(template.content, true);
}



/////////////////////vista previa imagen edicion




function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#preview-imageE").attr('src', e.target.result);
    };
    $("#preview-imageE").removeAttr("style");
    reader.readAsDataURL(input.files[0]);
  }
}