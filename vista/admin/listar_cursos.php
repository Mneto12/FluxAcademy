<script defer src="./login/ValidacionesJs/OnlyNumbers.js"></script>
<!-- Comienza la edicion de la pagina  -->
<div class="card col-md-12">
  <div class="card-header bg-teal color-palette">
    <h1>Listado de Cursos</h1>
  </div>

  <div class="card-body">
    <div class="row col-lg-12">
      <div class="col-lg-12" style="text-align: right;">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
          Registrar Curso
        </button>
      </div>
      <!--- Cargar la lista a desplegar -->
      <div class="col-lg-8">
        <div class="d-flex justify-content-end">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php
              require_once("../../modelo/cursos/listar.php");
              ?>
            </ul>
          </nav>
        </div>
      </div>
      <!-- Generar las tabla de registros --->
      <div class="col-lg-12">
        <table class="table table-hover" id="tablaCursos">
          <thead>
            <tr>
              <th>id</th>
              <th>Imagen</th>
              <th>Nombre del Curso</th>
              <th>Duración (Horas)</th>
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

      foreach ($curso as $cursos) {
        echo ('<tr>');
        echo ('<th scope="row">' . $cursos['idCurso'] . '</th>');
        echo ('<td>  <img  style="width:140px ; height:100px" sizes="10px"  src="../../assets/img/' . $cursos['imagen'] . '"></td>');
        echo ('<td>' . $cursos['nombre_curso'] . '</td>');
        echo ('<td>' . $cursos['duracion'] . '</td>');
        echo ('<td>');
        echo ('<div class="btn-group"');
        echo ('<div>');
        echo ('<button name="detalles" class="btn btn-primary"  data-toggle="modal" 
                                   data-target="#modalDetalles" onclick="mostrarDetalles(' . $cursos['idCurso'] . ')">
                                   <i class="fas fa-list-ul"></i></button>');
        echo ('<button name="edit" class="btn btn-success"  data-toggle="modal" 
                                   data-target="#modalEdit" onclick="EditCurso(' . $cursos['idCurso'] . ')">
                                   <i class="far fa-edit"></i></button>');
        echo ('<button name="borrar" class="btn btn-danger"
                                   onclick="borrarCurso(' . $cursos['idCurso'] . ')">
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
  <!-- Termina la edicion de la pagina  -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Creación de los modal para el CRUD  -->
<!-- Modal Crear -->
<div class="modal" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Registrar Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formCursos" enctype="multipart/form-data">

          <div class="form-group">
            <label for="nombre_curso"><strong>Nombre del Curso</strong></label>
            <input type="text" required class="form-control" name="nombre_curso" id="nombre_curso" placeholder="Ingrese nombre del curso...">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group ">
            <label for="descripcion"><strong>Descripción</strong></label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <label for="duracion"><strong>Duración (Horas)</strong></label>
            <input type="int" required class="form-control" name="duracion" id="duracion" placeholder="Ingrese la duración del curso"  maxlength="3" onkeypress="return onlyNumberKey(event)">
            <small class="oculto small">

            </small>
          </div>


          <div class="form-group">
            <label for="filechooser"><strong>Seleccione la imagen del curso</strong></label>
            <input class="form-control mb-2 mr-sm-2" type="file" name="filechooser" id="filechooser">
            <small class="oculto small">

            </small>
          </div>
          <div class="form-group">
            <input hidden type="text" name="imagen" id="imagen">
          </div>

          <div class="form-group">
            <label for="filechooserVideo"><strong>Seleccione video del curso</strong></label>
            <input class="form-control mb-2 mr-sm-2" type="file" name="filechooserVideo" id="filechooserVideo">
            <small class="oculto small">

            </small>
          </div>
          <div class="form-group">
            <input hidden type="text" name="video" id="video">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-info" onclick="VerificarCurso('crear')">Verificar</button>
            <button type="button" name="guardar" class="btn btn-primary btn--crear--curso" data-dismiss="modal" onclick="agregarCurso()" disabled>Guardar</button>
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
        <h5 class="modal-title" id="modalDetallesLabel">Detalles del Curso</h5>
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
                  <label for="nombre_cursoDetalle"><strong>Nombre del Curso</strong></label>
                  <input type="text" disabled class="form-control" id="nombre_cursoDetalle" name="nombre_cursoDetalle" id="Ingrese nombre del curso...">
                </div>

                <div class="form-group ">
                  <label for="descripcionDetalle"><strong>Descripción</strong></label>
                  <textarea disabled class="form-control" id="descripcionDetalle" name="descripcionDetalle" rows="3"></textarea>
                </div>

                <div class="form-group">
                  <label for="duracionDetalle"><strong>Duración (Horas)</strong></label>
                  <input type="int" disabled class="form-control" name="duracionDetalle" id="duracionDetalle">
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
        <h5 class="modal-title" id="modalEditLabel">Editar Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formEdit">
          <div class="form-group ">
            <input hidden type="number" class="form-control" name="idCursoEdit" id="idCursoEdit">
          </div>

          <div class="form-group">
            <label for="nombre_cursoEdit"><strong>Nombre del Curso</strong></label>
            <input type="text" required class="form-control" name="nombre_cursoEdit" id="nombre_cursoEdit" placeholder="Ingrese nombre del curso...">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group ">
            <label for="descripcionEdit"><strong>Descripción</strong></label>
            <textarea class="form-control" id="descripcionEdit" name="descripcionEdit" rows="3"></textarea>
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <label for="duracionEdit"><strong>Duración (Horas)</strong></label>
            <input type="int" required class="form-control" name="duracionEdit" id="duracionEdit" placeholder="Ingrese la duración del curso" maxlength="3" onkeypress="return onlyNumberKey(event)">
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

          <div class="form-group">
            <label for="filechooserVideoEdit"><strong>Seleccione el video del curso</strong></label>
            <input class="form-control mb-2 mr-sm-2" type="file" name="filechooserVideoEdit" id="filechooserVideoEdit">
            <small class="oculto small">

            </small>
          </div>

          <div class="form-group">
            <input hidden type="text" name="videoEdit" id="videoEdit">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-info" onclick="VerificarEditCurso()">Verificar</button>
            <button type="button" name="guardar" class="btn btn-primary btn--editar--curso" data-dismiss="modal" onclick="GuadarEdit()" disabled>Guardar</button>
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

<script src="../../assets/js/cursos.js"></script>
<script src="../../assets/js/verificarCreacionCurso.js"></script>
<script src="../../assets/js/verificarEdicionCursos.js"></script>
<script>
  $(document).ready(function() {
    $('#tablaCursos').DataTable({
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