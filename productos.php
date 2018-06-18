<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/productos.css">
  <title>Productos | Admin</title>
</head>

<body>
  <!-- navbar -->
  <nav class="blue darken-2" role="navigation">
    <div class="nav-wrapper container-fluid">
      <a href="index.php" class="brand-logo" id="logo">Sistema Ventas</a>    
      <ul class="right hide-on-med-and-down" id="barra"></ul>
      <ul id="nav-mobile" class="side-nav"></ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
<!-- 4 botones superiores -->
  <div class="row">
    <div class="col s11 offset-s1">
      <br>
      <!-- btn registrar -->
      <a id="btn-registrar" class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Registrar producto"><i class="material-icons">add</i></a>
      <a href="php/exportarPDF.php" target="_blank" class="btn-floating btn-large waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Exportar PDF"><i class="material-icons">picture_as_pdf</i></a>
      <br><br>
      <a id="todos" class="waves-effect waves-light btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Mostrar todos"><i class="material-icons right">cloud</i>Todos</a>
      <br><br>
      <div id="div-botones"></div>
    </div>
  </div>


<!-- template productos -->
  <template id="template-producto">
            <tr>
                <td data-idproducto></td>
                <td data-nombre></td>
                <td data-marca></td>
                <td data-descripcion></td>
                <td data-precio></td>
                <td data-stock></td>
                <td data-subcategoria></td>
                <td data-categoria></td>
            <td>
                    <a data-edit class="waves-effect waves-light btn"> 
                        <i class="large material-icons">edit</i>
                    </a>
                    <a data-image class="waves-effect waves-light btn"> 
                        <i class="large material-icons">image</i>
                    </a>
                    <a data-download class="waves-effect waves-light btn"> 
                        <i class="large material-icons">cloud_download</i>
                    </a>
                    <a data-delete class="waves-effect waves-light btn"> 
                        <i class="large material-icons">delete</i>
                    </a>
                </td>
            </tr>
        </template>

  <!--         <template id="template-card">
            <div class="col s4 m4">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span data-nombre class="card-title">Card Title</span>
                        <p data-descripcion>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p>
                        <p data-duracion></p>
                        <p data-categoria></p>
                    </div>
                    <div class="card-action">
                        <a href="#" data-editar>Editar</a>
                        <a href="#" data-eliminar>Eliminar</a>
                    </div>
                </div>
            </div>
        </template> -->



<!-- template botones categoria -->
  <template id="template-button">
            <a class="waves-effect waves-light btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="" data-button=""><i class="material-icons right">cloud</i><span data-nombre></span></a>
        </template>

  <!--  <div class="row" id="div-card">
            
        </div> -->

<!-- donde se muestra el contenido total -->
  <div class="row">
    <div class="col s10 offset-s1">
      <table class="striped responsive-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>SubCategoria</th>
            <th>Categoria</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody id="table-productos">

        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal registrar nuevo producto-->
  <div id="modalRegister" class="modal modal-fixed-footer">
    <form class="col s12" id="formRegister" enctype="multipart/form-data">
      <div class="modal-content">
        <h4>Registrar producto</h4>

        <div class="row">
          <div class="input-field col s6">
            <input id="nombre" name="nombre" type="text" class="validate">
            <label for="nombre">Nombre de la producto</label>
          </div>
          <div class="input-field col s6">
            <input id="precio" name="precio" type="text" class="validate">
            <label for="precio">Precio</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <textarea id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
            <label for="descripcion">Descripción</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <select id="cboCategorias" name="cboCategorias">
                <option value="0">Seleccione una Categoria</option>     
            </select>
            <label>Categoria</label>
          </div>
          <div class="input-field col s6">
            <select id="cboSubCategorias" name="cboSubCategorias" disabled>
                          <option value="0">Seleccione Subcategoria</option>      
            </select>
            <label>Subcategoría</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
              <select id="cboMarcas" name="cboMarcas" disabled>
                            <option value="0">Seleccione Marca</option>      
              </select>
              <label>Marca</label>
          </div>
          <div class="input-field col s6">
            <input id="stock" name="stock" type="text" class="validate">
            <label for="stock">Stock</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="url" name="url" type="text" class="validate">
            <label for="url">Url del producto</label>
          </div>
          <div class="input-field col s6">
              <div class="file-field input-field">
                  <div class="btn">
                      <span>Imagen</span>
                      <input type="file" id="imagen" name="imagen">
                  </div>
                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                  </div>
                  <img style="display: none" class="responsive-img" id="preview-image" src="#" alt="Preview Imagen">
              </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="waves-effect waves-green btn-flat ">Guardar</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
      </div>
    </form>
  </div>




<!-- modal editar -->
  <div id="modal3" class="modal modal-fixed-footer">
    <form id="formEdit" class="col s12" enctype="multipart/form-data">
      <div class="modal-content">
        <h4>Editar película</h4>
        <div class="row">
          <input type="hidden" name="idE" id="idE" value="">
          <div class="input-field col s6">
            <input id="nameE" name="nameE" type="text" class="validate">
            <label for="nameE">Ingrese nombre</label>
          </div>
          <div class="input-field col s6">
            <input id="duracionE" name="duracionE" type="text" class="validate">
            <label for="duracionE">Ingrese duracion (min)</label>
          </div>
          <div class="input-field col s6">
            <input id="descripcionE" name="descripcionE" type="text" class="validate">
            <label for="descripcionE">Ingrese descripcion</label>
          </div>
          <div class="input-field col s6">
            <input id="anioE" name="anioE" type="text" class="validate">
            <label for="anioE">Ingrese año estreno</label>
          </div>
          <div class="input-field col s6">
            <select id="categoriasE" name="categoriasE">
                            <option value="" disabled selected>Escoja la categoría</option>
                            
                          </select>
            <label>Categorias</label>
          </div>
          <div class="input-field col s6">
            <input id="urlE" name="urlE" type="text" class="validate">
            <label for="urlE">Ingrese url</label>
          </div>
          <div class="file-field input-field col s6">
            <div class="btn">
              <span>Imagen</span>
              <input type="file" id="image-filmE" name="image-filmE">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" id="imageE" type="text">
            </div>
            <img class="responsive-img" id="preview-imagenE" src="#" alt="Preview imagen">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="btn-edit" class="modal-action waves-effect waves-green btn-flat">Guardar</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
      </div>
    </form>
  </div>

  <!-- Modal Structure -->
  <div id="modalImage" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="titulo"></h4>
      <p id="description"></p>
      <div class="col s12">
        <img src="#" alt="Imagen" id="showImage" class="responsive-img">
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>

  <!--  Scripts okkkkkkkkkkkkkkkkkk-->
  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/btnnavbar.js"></script>
  <script src="js/productos.js"></script>

</body>

</html>

<!-- 
    header('Location: index.php'); 

 -->