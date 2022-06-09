<div class="card">
    <div class="card-header">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro" data-whatever="@mdo">Open modal for @mdo</button>
    
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="ui celled table" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Duración</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($datos))
                    foreach ($datos as $key => $value)
                        foreach ($value as $v) : ?>
                    <tr>
                        <td><?php echo $v['id'] ?></td>
                        <td><img src="../../assets/img/<?php echo $v['imagen'] ?>" width="100px"></td>
                        <td><?php echo $v['nombre_curso'] ?></td>
                        <td><?php echo $v['descripcion'] ?></td>
                        <td><?php echo $v['duracion'] ?></td>
                        <td>
                            <a href="/index.php?m=editar&id=<?php echo $v['id'] ?>"></a>
                            <a href="/index.php?m=eliminar&id=<?php echo $v['id'] ?>"></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    </div>
    <!-- /.card-body -->
    <!-- Modal -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/vista/admin/index.php?m=guardar" method="get">
          <div class="form-group">
            <label for="nombre_curso" class="col-form-label">Nombre del Curso: </label>
            <input type="text" class="form-control" id="nombre_curso" name="nombre_curso">
          </div>
          <div class="form-group">
            <label for="descripcion" class="col-form-label">Descripción: </label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
          </div>
          <div class="form-group">
            <label for="duracion" class="col-form-label">Duración: </label>
            <input type="text" class="form-control" id="duracion" name="duracion">
          </div>
          <div class="form-group">
            <label for="imagen" class="col-form-label">Imagen: </label>
            <input type="text" class="form-control" id="imagen" name="imagen">
          </div>

            <input type="submit" name="btn" value="guardar">
            <input type="hidden" name="m" value="guardar">
            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>