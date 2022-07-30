<!-- Comienza la edicion de la pagina  -->
<div class="card col-md-12">
  <div class="card-header bg-teal color-palette">
    <h1>Usuarios Inscritos</h1>
  </div>

  <div class="card-body">
    <div class="row col-lg-12">
      <div class="col-lg-12" style="text-align: right;">
      </div>
      <!--- Cargar la lista a desplegar -->
      <div class="col-lg-8">
        <div class="d-flex justify-content-end">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php
              require_once("../../modelo/matricula/listado.php");
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
              <th>Nombre del Curso</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Fecha de Inscripción</th>
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

      foreach ($matriculas as $matricula) {
        echo ('<tr>');
        echo ('<th scope="row">' . $matricula['idInscripcion'] . '</th>');
        echo ('<td>' . $matricula['nombre_curso'] . '</td>');
        echo ('<td>' . $matricula['nombre'] . '</td>');
        echo ('<td>' . $matricula['apellido'] . '</td>');
        echo ('<td>' . $matricula['creado'] . '</td>');
        echo ('</tr>');
      }
      ?>

      </tbody>
      </table>

    </div>

  </div>
  <!-- Termina la edicion de la pagina  -->
</div>

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