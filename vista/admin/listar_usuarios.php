<script defer src="./login/ValidacionesJs/OnlyNumbers.js"></script>
<script defer src="./login/ValidacionesJs/OnlyText.js"></script>
<!-- Comienza la edicion de la pagina  -->
<div class="card col-md-12">
  <div class="card-header bg-teal color-palette">
    <h1>Listado de Usuarios</h1>
  </div>

  <div class="card-body">
    <div class="row col-lg-12">
      <div class="col-lg-12" style="text-align:right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
          Registrar Usuario
        </button>
      </div>
      <!--- Cargar la lista a desplegar -->
      <div class="col-lg-8">
        <div class="d-flex justify-content-end">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php
              require_once("../../modelo/usuarios/listar.php");
              ?>
            </ul>
          </nav>
        </div>
      </div>
      <!-- Generar las tabla de registros --->
      <div class="col-lg-12">
        <table class="table table-hover" id="tablaUsuario">
          <thead>
            <tr>
              <th>id</th>
              <th>Imagen</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Correo</th>
              <th>Genero</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            <img class="
                            <div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <a href="#" class="thumbnail">
              <img data-src="#" alt="">
            </a>
      </div>

      <?php

      foreach ($usuarios as $usuario) {
        echo ('<tr>');
        echo ('<th scope="row">' . $usuario['idUsuario'] . '</th>');
        echo ('<td>  <img  style="width:40px ; height:40px ; border-radius: 100%" sizes="10px"  src="../../assets/img/' . $usuario['imagen'] . '"></td>');
        echo ('<td>' . $usuario['nombre'] . '</td>');
        echo ('<td>' . $usuario['apellido'] . '</td>');
        echo ('<td>' . $usuario['correo'] . '</td>');
        echo ('<td>' . $usuario['genero'] . '</td>');
        echo ('<td>');
        echo ('<div class="btn-group"');
        echo ('<div>');
        echo ('<button name="detalles" class="btn btn-primary"  data-toggle="modal" 
                                   data-target="#modalDetalles" onclick="mostrarDetalles(' . $usuario['idUsuario'] . ')">
                                   <i class="fas fa-list-ul"></i></button>');
        echo ('<button name="edit" class="btn btn-success"  data-toggle="modal" 
                                   data-target="#modalEdit" onclick="EditUsuario(' . $usuario['idUsuario'] . ')">
                                   <i class="far fa-edit"></i></button>');
        echo ('<button name="borrar" class="btn btn-danger"
                                   onclick="borrarUsuario(' . $usuario['idUsuario'] . ')">
                                   <i class="far fa-trash-alt"></i></button>');

        echo ('</div>');
        echo ('</div>');
        echo ('</td>');
        echo ('</tr>');
      }
      ?>

      </tbody>
      </table>

    </div>

  </div>
</div>

<!-- Termina la edicion de la pagina  -->

<!-- /.container-fluid -->

<!-- End of Main Content -->

<!-- Creación de los modal para el CRUD  -->
<!-- Modal Crear -->
<div class="modal" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Registrar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formUsuario" enctype="multipart/form-data">

          <div class="form-group">
            <label for="cedula"><strong>Cédula</strong></label>
            <input type="int" required class="form-control" name="cedula" id="cedula" placeholder="Ingrese cédula..." maxlength="8" onkeypress="return onlyNumberKey(event)">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <label for="nombre"><strong>Nombre</strong></label>
            <input type="text" required class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre..." onkeypress="return onlyTextKey(event)">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <label for="apellido"><strong>Apellido</strong></label>
            <input type="text" required class="form-control" name="apellido" id="apellido" placeholder="Ingrese apellido..." onkeypress="return onlyTextKey(event)">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <label for="genero"><strong>Genero</strong></label>
            <span>Masculino</span>
            <input class="sexo" type="radio" name="genero" id="hombre" value="Masculino">
            <span>Femenino</span>
            <input class="sexo" type="radio" name="genero" id="mujer" value="Femenino">
            <small class="oculto errorSexo small">

            </small>
          </div>

          <div class="form-group">
            <label for="fecha_nacimiento"><strong>Fecha de Nacimiento</strong></label>
            <input type="date" required class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Ingrese fecha de nacimiento...">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <label for="nombre_usuario"><strong>Nombre de Usuario</strong></label>
            <input type="text" required class="form-control" name="nombre_usuario" id="nombre_usuario" placeholder="Ingrese nombre usuario...">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <label for="correo"><strong>Correo</strong></label>
            <input type="text" required class="form-control" name="correo" id="correo" placeholder="Ingrese correo electrónico...">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <label for="contrasena"><strong>Contraseña</strong></label>
            <input type="text" required class="form-control" name="contrasena" id="contrasena" placeholder="Ingrese contraseña...">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <label for="filechooser"><strong>Seleccione la imagen del usuario</strong></label>
            <input class="form-control mb-2 mr-sm-2" type="file" name="filechooser" id="filechooser">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <input hidden type="text" name="imagen" id="imagen">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-info" onclick="submitForm('modal')">Verificar</button>
            <button type="button" name="guardar" class="btn btn-primary btn--crear--usuario" data-dismiss="modal" onclick="submitForm('validado')" disabled>Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detalles-->
<div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="modalDetallesLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetallesLabel">Detalles del Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="get" id="formDetalles">

          <div class="container">
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="imagenDetalle"><strong>Imagen del Curso</strong></label> <br><br>
                  <img width="200px" height="200px" style="border: 1 solid ;" name="imagenDetalle" id="imagenDetalle" src="" alt="">
                </div>

              </div>
              <div class="col-sm-7 ml-5">
                <div class="form-group">
                  <label for="cedulaDetalle"><strong>Cédula</strong></label>
                  <input type="int" disabled class="form-control" name="cedulaDetalle" id="cedulaDetalle">
                </div>
                <div class="form-group">
                  <label for="nombreDetalle"><strong>Nombre</strong></label>
                  <input type="text" disabled class="form-control" name="nombreDetalle" id="nombreDetalle">
                </div>
                <div class="form-group">
                  <label for="apellidoDetalle"><strong>Apellido</strong></label>
                  <input type="text" disabled class="form-control" name="apellidoDetalle" id="apellidoDetalle">
                </div>
                <div class="form-group">
                  <label for="generoDetalle"><strong>Género</strong></label>
                  <input type="text" disabled class="form-control" name="generoDetalle" id="generoDetalle">
                </div>
                <div class="form-group">
                  <label for="fecha_nacimientoDetalle"><strong>Fecha de Nacimiento</strong></label>
                  <input type="date" disabled class="form-control" name="fecha_nacimientoDetalle" id="fecha_nacimientoDetalle">
                </div>
                <div class="form-group">
                  <label for="nombre_usuarioDetalle"><strong>Nombre de Usuario</strong></label>
                  <input type="text" disabled class="form-control" name="nombre_usuarioDetalle" id="nombre_usuarioDetalle">
                </div>
                <div class="form-group">
                  <label for="correoDetalle"><strong>Correo Electrónico</strong></label>
                  <input type="text" disabled class="form-control" name="correoDetalle" id="correoDetalle">
                </div>
                <div class="form-group">
                  <label for="contrasenaDetalle"><strong>Contraseña</strong></label>
                  <input type="text" disabled class="form-control" name="contrasenaDetalle" id="contrasenaDetalle">
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
              </div>

            </div>
          </div>



        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal Editar-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formEdit">
          <div class="form-group ">
            <input hidden type="number" class="form-control" name="idUsuarioEdit" id="idUsuarioEdit">
          </div>

          <div class="form-group">
            <div class="col-sm-3">
            </div>
            <label for="cedulaEdit"><strong>Cedula</strong></label>
            <input type="int" required class="form-control" name="cedulaEdit" id="cedulaEdit" placeholder="Ingrese cédula..." maxlength="8" onkeypress="return onlyNumberKey(event)">
            <small class="oculto small">
              
            </small>
          </div>

          <div class="form-group">
            <label for="nombreEdit"><strong>Nombre</strong></label>
            <input type="text" required class="form-control" name="nombreEdit" id="nombreEdit" placeholder="Ingrese nombre..." onkeypress="return onlyTextKey(event)">
            <small class="oculto small">
              
            </small>
          </div>

          <div class="form-group">
            <label for="apellidoEdit"><strong>Apellido</strong></label>
            <input type="text" required class="form-control" name="apellidoEdit" id="apellidoEdit" placeholder="Ingrese apellido..." onkeypress="return onlyTextKey(event)">
            <small class="oculto small">
              
            </small>
          </div>

          <div class="form-group">
            <label for="generoEdit"><strong>Genero</strong></label>
            <span>Masculino</span>
            <input class="sexo" type="radio" name="generoEdit" id="hombreedit" value="Masculino">
            <span>Femenino</span>
            <input class="sexo" type="radio" name="generoEdit" id="mujeredit" value="Femenino">
            <small id="generoEdit2" class="oculto small">
              
            </small>
          </div>

          <div class="form-group">
            <label for="fecha_nacimientoEdit"><strong>Fecha de Nacimiento</strong></label>
            <input type="date" required class="form-control" name="fecha_nacimientoEdit" id="fecha_nacimientoEdit" placeholder="Ingrese fecha de nacimiento...">
            <small class="oculto small">
              
            </small>
          </div>

          <div class="form-group">
            <label for="nombre_usuarioEdit"><strong>Nombre de Usuario</strong></label>
            <input type="text" required class="form-control" name="nombre_usuarioEdit" id="nombre_usuarioEdit" placeholder="Ingrese nombre de usuario...">
            <small class="oculto small">
              
            </small>
          </div>

          <div class="form-group">
            <label for="correoEdit"><strong>Correo</strong></label>
            <input type="text" required class="form-control" name="correoEdit" id="correoEdit" placeholder="Ingrese correo electrónico...">
            <small class="oculto small">
              
            </small>
          </div>

          <div class="form-group">
            <label for="contrasenaEdit"><strong>Contraseña</strong></label>
            <input type="text" required class="form-control" name="contrasenaEdit" id="contrasenaEdit" placeholder="Ingrese contraseña...">
            <small class="oculto small">
              
            </small>
          </div>

          <div class="form-group">
            <label for="filechooserEdit"><strong>Seleccione la imagen del curso</strong></label>
            <input class="form-control mb-2 mr-sm-2" type="file" name="filechooserEdit" id="filechooserEdit">
            <small class="oculto small">
              
            </small>
          </div>

          <div class="form-group">
            <input hidden type="text" name="imagenEdit" id="imagenEdit">
          </div>

          <div class="modal-footer modal--footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-info" onclick="Verificar('true')">Verificar</button>
            <button type="button" name="guardar" data-dismiss="modal" class="btn btn-primary btn--editar--usuario" onclick="GuadarEdit()" disabled>Guardar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<style>
  small {
    display: flex;
    align-items: center;
    margin-top: 1rem;
    background-color: #dc3545;
    border-radius: 5px;
    width: 50%;
}
.oculto {
    display: none;
}
</style>

<script src="../../assets/js/usuario.js"></script>
<script src="../../assets/js/VerificarEdicion.js"></script>
<script src="../../assets/js/registro.js"></script>
<script>
  $(document).ready(function() {
    $('#tablaUsuario').DataTable({
      "order": [
        [0, "des"]
      ],
      "lengthMenu": [
        [5, 10, 25, -1],
        [5, 10, 25, "All"]
      ]
    });
  });
</script>