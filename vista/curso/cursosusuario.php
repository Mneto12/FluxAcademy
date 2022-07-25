
<div class="card col-md-12">
  <div class="card-header bg-teal color-palette">
  <h1 class="m-0">Listado de Cursos</h1>
  </div>
  <div class="card-body">
    <div class="row">


      <?php
      require_once("../../modelo/matricula/listarcursosusuario.php");
      foreach ($curso as $cursos) {

      ?>
        <div class="card" style="width: 22rem ;">
          <img class="card-img-top" style="width: 100% ; height: 200px" src="../../assets/img/<?php echo $cursos['imagen'] ?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="titulocard"><?php echo $cursos['nombre_curso'] ?></h2>
            <p class="card-text"><?php echo $cursos['descripcion'] ?></p>
            <button name="edit" class="btn btn-success"  data-toggle="modal" 
                                   data-target="#modalEdit" onclick="EditCurso(<?php echo $cursos['idCurso'] ?>)">
                                   <i class="far"> Ver</i></button>
          </div>
        </div>
        <div style="padding-right: 10px ;"></div>
      <?php } ?>
    </div>
  </div>
</div>

<!-- Modal inscribir-->

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h1 id="titulo"></h1>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarVideo()">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formEdit">
          <div class="form-group ">
            <input hidden type="number" class="form-control" name="idCursoEdit" id="idCursoEdit">
          </div>
          <div class="form-group ">
            <input hidden type="number" class="form-control" name="idUsuarioEdit" id="idUsuarioEdit" value="<?php echo $_SESSION['idUsuario']?>">
          </div>

          <div class="form-group">

          </div>
          <center>
              <video id="video" src="" width="600" height="350" controls autoplay="autoplay"></video>
          </center>
       
          <div class="modal-footer">
            <button type="button" name="guardar" class="btn btn-primary" data-dismiss="modal" onclick="cerrarVideo()">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Termina la edicion de la pagina  -->

<!-- /.container-fluid -->
<!-- End of Main Content -->


<script src="../../assets/js/visualizarcursos.js"></script>